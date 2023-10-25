<?php
if (!defined('SOURCES')) die("Error");

/* Kiểm tra active export */
if (isset($config['product'])) {
	$arrCheck = array();
	foreach ($config['product'] as $k => $v) if (isset($v['export']) && $v['export'] == true) $arrCheck[] = $k;
	if (!count($arrCheck) || !in_array($type, $arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
} else {
	$func->transfer("Trang không tồn tại", "index.php", false);
}
switch ($act) {
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
	/* Setting */
	$setting = $d->rawQueryOne("select * from #_setting limit 0,1");
	if (isset($type)) {
		/* PHPExcel */
		require_once LIBRARIES . 'PHPExcel.php';
		/* Khởi tọa đối tượng */
		$PHPExcel = new PHPExcel();
		/* Khởi tạo thông tin người tạo */
		$PHPExcel->getProperties()->setCreator($setting['tenvi']);
		$PHPExcel->getProperties()->setLastModifiedBy($setting['tenvi']);
		$PHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
		$PHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
		$PHPExcel->getProperties()->setDescription("Document for Office 2007 XLSX, generated using PHP classes.");
		$alphas = array();
		for ($i = 'A'; $i !== 'ZY'; $i++) {
			array_push($alphas, $i);
		}
		$array_file = array(
			"id" => "ID",
			"stt" => "Số thứ tự",
			"tenvi" => "Tên sản phẩm",
			"tenkhongdauvi" => "Đường dẫn sản phẩm",
			"masp" => "Mã sản phẩm",
			"id_list" => "Danh mục cấp 1",
			"id_cat" => "Danh mục cấp 2",
			"id_item" => "Danh mục cấp 3",
			"photo" => "Hình ảnh",
			"gia" => "Giá bán",
			"donvi" => "Đơn vị tính",
			"motanganvi" => "Mô tả ngắn",
			"motavi" => "Mô tả",
			"motangan2vi" => "Mô tả dưới thành tiền",
			"noidungvi" => "Nội dung",
		);
		$i = 0;
		foreach ($array_file as $k => $v) {
			if ($k == 'masp') {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);
			} else if (in_array($k, ['tenvi', 'tenkhongdauvi'])) {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(25);
			}else if (in_array($k, ['motavi', 'motanganvi', 'motangan2vi'])) {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(50);
			} else if ($k == 'noidungvi') {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(150);
			} else {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);
			}
			$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$i] . '1', $v);
			$PHPExcel->getActiveSheet()->getStyle($alphas[$i] . '1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff'), 'name' => 'Calibri', 'bold' => true, 'italic' => false, 'size' => 10), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '007BFF'))));
			$i++;
		}

		$products = $d->rawQuery("select id, stt, tenvi, masp, gia,id_list,tenkhongdauvi,id_cat,id_item, donvi, photo, motanganvi, motavi, motangan2vi, noidungvi from #_product where type = ? order by stt,id desc", array($type));
		$vitri = 2;

		for ($i = 0; $i < count($products); $i++) {
			$j = 0;
			foreach ($array_file as $k => $v) {
				if ($k == 'id_list') {
					$rowList = $d->rawQueryOne("select tenvi from #_product_list where id=?", array($products[$i][$k]));
					$datacell = $rowList['tenvi'];
				} else if ($k == 'id_cat') {
					$rowCat = $d->rawQueryOne("select tenvi from #_product_cat where id=?", array($products[$i][$k]));
					$datacell = $rowCat['tenvi'];
				} else if ($k == 'id_item') {
					$rowItem = $d->rawQueryOne("select tenvi from #_product_item where id=?", array($products[$i][$k]));
					$datacell = $rowItem['tenvi'];
				} else {
					$datacell = $products[$i][$k];
				}
				$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$j] . $vitri, htmlspecialchars_decode($datacell));
				$j++;
			}
			$vitri++;
		}
		/* Style cho các row dữ liệu */
		$vitri = 2;
		for ($i = 0; $i < count($products); $i++) {
			$j = 0;
			foreach ($array_file as $k => $v) {
				$PHPExcel->getActiveSheet()->getStyle($alphas[$j] . $vitri)->applyFromArray(
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
		header('Content-Disposition: attachment;filename="products_' . $time . '_' . date('d_m_Y') . '.xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit();
	} else {
		$func->transfer("Dữ liệu rỗng", "index.php?com=export&act=man&type=" . $type, false);
	}
}
