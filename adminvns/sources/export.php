<?php
	if(!defined('SOURCES')) die("Error");

	/* Kiểm tra active export */
	if(isset($config['product']))
	{
		$arrCheck = array();
		foreach($config['product'] as $k => $v) if(isset($v['export']) && $v['export'] == true) $arrCheck[] = $k;
		if(!count($arrCheck) || !in_array($type,$arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
	}
	else
	{
		$func->transfer("Trang không tồn tại", "index.php", false);
	}

	switch($act)
	{
		case "man":
			$template = "export/man/items";
			break;

		case "exportExcel":
			exportExcel();
			break;

		default:
			$template = "404";
	}

	function exportExcel()
	{
		global $d, $func, $type;

		$type2 = $_REQUEST['type2'];
		/* Setting */
		$setting = $d->rawQueryOne("select * from #_setting limit 0,1");
		$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;


		$tenfilter = $d->rawQuery("select id,tenvi as ten from #_product_size where type = ? and type2 = ? order by id asc", array($type,$type2));

		$arridfilter = array();
		foreach ($tenfilter as $key => $value) {
			array_push($arridfilter,$value['id']);
		}
		if(isset($type2))
		{

			/* PHPExcel */
			require_once LIBRARIES.'PHPExcel.php';

			/* Khởi tọa đối tượng */
			$PHPExcel = new PHPExcel();

			/* Khởi tạo thông tin người tạo */
			$PHPExcel->getProperties()->setCreator($setting['tenvi']);
			$PHPExcel->getProperties()->setLastModifiedBy($setting['tenvi']);
			$PHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
			$PHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
			$PHPExcel->getProperties()->setDescription("Document for Office 2007 XLSX, generated using PHP classes.");

			/* Khởi tạo mảng column */
			// $alphas = range('A','Z');
			$alphas = array();
			for ($i = 'A'; $i !== 'ZY'; $i++){
				array_push($alphas,$i);
			}
			$array_file = array(
				'masp'=>'Mã sản phẩm',
				'tenvi'=>'Tên Sản phẩm',
			);
			foreach ($tenfilter as $key => $value) {
				$keys = $type2."_".$value['id'];
				$dulieu = $value['ten'];
				$array_file[$keys] = $dulieu;
			}

			/* Khởi tạo và style cho row đầu tiên */
			$i=0;
			foreach($array_file as $k=>$v)
			{
				 if($k=='masp')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);
				}
				else if($k=='tenvi')
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(25);
				}else
				{
					$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);

				}

				$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$i].'1', $v);
				$PHPExcel->getActiveSheet()->getStyle($alphas[$i].'1')->applyFromArray( array( 'font' => array( 'color' => array( 'rgb' => 'ffffff' ), 'name' => 'Calibri', 'bold' => true, 'italic' => false, 'size' => 10 ), 'alignment' => array( 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true ),'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb'=>'007BFF'))));
				$i++;

			}

			/* Lấy và Xuất dữ liệu */
			// $whereCategory = "";
			// $data = (isset($_POST['data'])) ? $_POST['data'] : null;
			// if($data)
			// {
			// 	foreach($data as $column => $value)
			// 	{
			// 		if($value > 0)
			// 		{
			// 			$whereCategory .= " and ".$column." = ".$value;
			// 		}
			// 	}
			// }

			$product = $d->rawQuery("select id,masp,tenvi,id_size,id_chatlieu,id_somat,id_canmang,id_khoanlo,id_soduongcung,id_hinhdang,id_cachthuc,id_kieube,id_soluong from #_product where type = ? $whereCategory order by stt,id desc",array($type));

			$vitri=2;

			for($i=0;$i<count($product);$i++)
			{
				$j=0;
				foreach($array_file as $k => $v)
				{
					if($k == 'masp' || $k == 'tenvi' ){
						$datacell = $product[$i][$k];
					}else{

						$filterproduct = explode("_",$k);

						$idfilter = $filterproduct[1];
						// $setting = $d->rawQueryOne("select id from #_setting limit 0,1");
						$idproduct = $product[$i]['id'];
						$stringfilter = $product[$i]['id_'.$filterproduct[0]];
						if($stringfilter != ''){
							$arrayfilter = explode(',',$stringfilter);
						}
						$datacell = '';
						if(in_array($idfilter,$arrayfilter)){
							$sanphamgia = $d->rawQueryOne("select gia from #_product_price where id_$type2 = ? and id_product = ?  limit 0,1",array($idfilter,$idproduct));
							$datacell = $sanphamgia['gia'];
						};
					}



					if($k=='masp')
					{
						$PHPExcel->getActiveSheet()->setCellValueExplicit($alphas[$j].$vitri, htmlspecialchars_decode($datacell),  PHPExcel_Cell_DataType::TYPE_STRING);
					}
					else
					{
						$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$j].$vitri, htmlspecialchars_decode($datacell));
					}
					$j++;
				}
				$vitri++;
			}
			/* Style cho các row dữ liệu */
			$vitri=2;
			for($i=0;$i<count($product);$i++)
			{
				$j=0;
				foreach($array_file as $k=>$v)
				{
					$PHPExcel->getActiveSheet()->getStyle($alphas[$j].$vitri)->applyFromArray(
						array(
							'font' => array(
								'color' => array('rgb' => '000000'),
								'name' => 'Calibri',
								'bold' => false,
								'italic' => false,
								'size' => 10
							),
							'alignment' => array(
								'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
								'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
								'wrap' => true
							)
						)
					);
					$j++;
				}
				$vitri++;
			}

			/* Rename title */
			$PHPExcel->getActiveSheet()->setTitle('Products List');

			/* Khởi tạo chỉ mục ở đầu sheet */
			$PHPExcel->setActiveSheetIndex(0);

			/* Xuất file */
			$time = time();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="products_'.$time.'_'.date('d_m_Y').'.xlsx"');
			header('Cache-Control: max-age=0');

			$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit();
		}
		else
		{
			$func->transfer("Dữ liệu rỗng", "index.php?com=export&act=man&type=".$type, false);
		}
	}
?>