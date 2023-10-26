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
	case "exportExcelOptions";
		exportOptions();
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
			"titlevi" => "Seo title",
			"keywordsvi" => "Seo keyword",
			"descriptionvi" => "Seo descriptions",
			"hienthi" => "Hiển thị",
		);
		$i = 0;
		foreach ($array_file as $k => $v) {
			if ($k == 'masp') {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);
			} else if (in_array($k, ['tenvi', 'tenkhongdauvi', 'titlevi', 'keywordsvi'])) {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(25);
			} else if (in_array($k, ['motavi', 'motanganvi', 'motangan2vi','descriptionvi'])) {
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

		$products = $d->rawQuery("select id, stt, tenvi, masp, gia,id_list,tenkhongdauvi,id_cat,id_item, donvi, photo, motanganvi, motavi, motangan2vi, noidungvi, hienthi from #_product where type = ? order by stt,id desc", array($type));
		$vitri = 2;

		for ($i = 0; $i < count($products); $i++) {
			$j = 0;
			$productId = $products[$i]['id'];
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
				}else if (in_array($k,['titlevi','keywordsvi','descriptionvi'])) {
					$seo = $d->rawQueryOne("select titlevi, keywordsvi, descriptionvi from #_seo where idmuc=?", array($productId));
					$datacell = $seo[$k];
				}
				 else {
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
function exportOptions()
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
			"tenvi" => "Tên sản phẩm",
			"tenkhongdauvi" => "Đường dẫn sản phẩm",
		);
		$arrayKT = [
			"kich_thuoc" => "Kích thước",
		];
		$arrayKTCL = [
			"kho_in" => "Khổ in",
			"chat_lieu" => "Chất liệu",
			"total_count_decal" => "Số con khả thi trên 1 khổ decal",
			"price_nl_m2" => "Giá NL + ịn 1m",
			"price_nl" => "Giá ng NL",
			"can_mang" => "Cán màng",
			"quy_cach" => "Quy cách",
			"mat_in" => "Mặt in",
			"so_luong" => "Số lượng",
			"thoi_gian" => "Thời gian",
		];
		$newArray = array_merge($array_file, $arrayKT, $arrayKTCL);
		$i = 0;
		foreach ($newArray as $k => $v) {
			if ($k == 'masp') {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);
			} else if ($k == 'chat_lieu') {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(50);
			} else if (in_array($k, ['tenvi', 'tenkhongdauvi'])) {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(25);
			} else if (in_array($k, ['can_mang', 'quy_cach', 'mat_in', 'so_luong', 'thoi_gian'])) {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(50);
			} else {
				$PHPExcel->getActiveSheet()->getColumnDimension($alphas[$i])->setWidth(15);
			}
			$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$i] . '1', $v);
			$PHPExcel->getActiveSheet()->getStyle($alphas[$i] . '1')->applyFromArray(array('font' => array('color' => array('rgb' => 'ffffff'), 'name' => 'Calibri', 'bold' => true, 'italic' => false, 'size' => 10), 'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'wrap' => true), 'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '007BFF'))));
			$i++;
		}

		$products = $d->rawQuery("select id, tenvi, tenkhongdauvi from #_product where type = ? order by stt,id desc", array($type));
		$vitri = 2;
		for ($i = 0; $i < count($products); $i++) {
			$j = 0;
			$jj = 0;
			$productId = $products[$i]['id'];
			foreach ($array_file as $k => $v) {
				$datacell = $products[$i][$k];
				$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$j] . $vitri, htmlspecialchars_decode($datacell));
				$j++;
			}
			$kichThuoc = $d->rawQuery("select id,length,width from #_product_kich_thuocs where product_id= ?", array($productId));
			if (!empty($kichThuoc)) {
				for ($k_index = 0; $k_index < count($kichThuoc); $k_index++) {
					// add data product with kich thươc
					$ktPosition = 0;
					foreach ($array_file as $kP => $vP) {
						$datacell = $products[$i][$kP];
						$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$ktPosition] . $vitri, htmlspecialchars_decode($datacell));
						$ktPosition++;
					}
					// end add data product with kich thươc
					$jj = $j;
					$kichThuocId = $kichThuoc[$k_index]['id'];
					$dsKichThuocChatLieu = $d->rawQuery("select id,total_count_decal,price_nl_m2,price_nl,cl_id,ki_id from #_product_kich_thuoc_chat_lieus where kt_id= ?", array($kichThuocId));
					foreach ($arrayKT as $k => $v) {
						$datacell = $kichThuoc[$k_index]['length'] . "x" . $kichThuoc[$k_index]['width'];
						$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$jj] . $vitri, htmlspecialchars_decode($datacell));
						$jj++;
					}
					if (!empty($dsKichThuocChatLieu)) {
						for ($ktcl_index = 0; $ktcl_index < count($dsKichThuocChatLieu); $ktcl_index++) {
							// add data product with kich thươc
							$ktPosition = 0;
							$arrayMerge = array_merge($array_file, $arrayKT);
							foreach ($arrayMerge as $kP => $vP) {
								if($kP == 'kich_thuoc'){
									$datacell = $kichThuoc[$k_index]['length'] . "x" . $kichThuoc[$k_index]['width'];
								}else{
									$datacell = $products[$i][$kP];
								}
								$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$ktPosition] . $vitri, htmlspecialchars_decode($datacell));
								$ktPosition++;
							}
							// end add data product with kich thươc
							$jjj = $jj;
							$kt_cl_id = $dsKichThuocChatLieu[$ktcl_index]['id'];
							// get Chất Liệu
							$chatLieuId = $dsKichThuocChatLieu[$ktcl_index]['cl_id'];
							$detailCL = $d->rawQueryOne("select name from #_product_chat_lieus where id=?", array($chatLieuId));
							// get Khổ in
							$khoInId = $dsKichThuocChatLieu[$ktcl_index]['ki_id'];
							$detailKI = $d->rawQueryOne("select * from #_product_kho_ins where id=?", array($khoInId));

							// get danh sách mặt in
							$dsMatIn = $d->rawQuery("SELECT s1.id AS id1, s1.mi_id AS mi_id, s2.name AS name, s2.percent AS percent
							FROM table_product_kich_thuoc_chat_lieu_mat_ins AS s1 , table_product_mat_ins AS s2
							WHERE s1.mi_id = s2.id AND s1.ktcl_id = ?", array($kt_cl_id));
							$stringMatIn = '';
							if (!empty($dsMatIn)) {
								foreach ($dsMatIn as $key => $mi) {
									$stringMatIn .= $mi['name'] . ',';
								}
								$stringMatIn = rtrim($stringMatIn, ',');
							}
							// get danh sách cán màng
							$dsCanMang = $d->rawQuery("SELECT s1.id AS id1, s1.cm_id AS cm_id, s2.name AS name, s2.percent AS percent
							FROM table_product_kich_thuoc_chat_lieu_can_mangs AS s1 , table_product_can_mangs AS s2
							WHERE s1.cm_id = s2.id AND s1.ktcl_id = ?", array($kt_cl_id));
							$stringCanMang = '';
							if (!empty($dsCanMang)) {
								foreach ($dsCanMang as $key => $cm) {
									$stringCanMang .= $cm['name'] . ',';
								}
								$stringCanMang = rtrim($stringCanMang, ',');
							}
							// get danh sách quy cách
							$dsQuyCach = $d->rawQuery("SELECT s1.id AS id1, s1.qc_id AS qc_id, s2.name AS name, s2.point AS point
							FROM table_product_kich_thuoc_chat_lieu_quy_cachs AS s1 , table_product_quy_cachs AS s2
							WHERE s1.qc_id = s2.id AND s1.ktcl_id = ?", array($kt_cl_id));

							$stringQuyCach = '';
							if (!empty($dsQuyCach)) {
								foreach ($dsQuyCach as $key => $qc) {
									$stringQuyCach .= $qc['name'] . ',';
								}
								$stringQuyCach = rtrim($stringQuyCach, ',');
							}


							// get danh sách số lượng
							$dsSoLuong = $d->rawQuery("SELECT s1.id AS id1, s1.sl_id AS sl_id, s2.name AS name, s2.count AS count
							FROM table_product_kich_thuoc_chat_lieu_soluongs AS s1 , table_product_so_luongs AS s2
							WHERE s1.sl_id = s2.id AND s1.ktcl_id = ?", array($kt_cl_id));

							$stringSoLuong = '';
							if (!empty($dsSoLuong)) {
								foreach ($dsSoLuong as $key => $sl) {
									$stringSoLuong .= $sl['name'] . ',';
								}
								$stringSoLuong = rtrim($stringSoLuong, ',');
							}

							// get danh sách thời gian
							$dsThoiGian = $d->rawQuery("SELECT s1.id AS id1, s1.tg_id AS tg_id, s2.name AS name, s2.percent AS percent
							FROM table_product_kich_thuoc_chat_lieu_thoi_gians AS s1 , table_product_thoi_gians AS s2
							WHERE s1.tg_id = s2.id AND s1.ktcl_id = ?", array($kt_cl_id));

							$stringThoiGian = '';
							if (!empty($dsThoiGian)) {
								foreach ($dsThoiGian as $key => $tg) {
									$stringThoiGian .= $tg['name'] . ',';
								}
								$stringThoiGian = rtrim($stringThoiGian, ',');
							}

							foreach ($arrayKTCL as $k3 => $v3) {
								if ($k3 == 'kho_in') {
									$datacell = $detailKI['left'] . "x" . $detailKI['right'];
								} else if ($k3 == 'chat_lieu') {
									$datacell = $detailCL['name'];
								} else if ($k3 == 'mat_in') {
									$datacell = $stringMatIn;
								} else if ($k3 == 'quy_cach') {
									$datacell = $stringQuyCach;
								} else if ($k3 == 'can_mang') {
									$datacell = $stringCanMang;
								} else if ($k3 == 'so_luong') {
									$datacell = $stringSoLuong;
								} else if ($k3 == 'thoi_gian') {
									$datacell = $stringThoiGian;
								} else {
									$datacell = $dsKichThuocChatLieu[$ktcl_index][$k3];
								}
								$PHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$jjj] . $vitri, htmlspecialchars_decode($datacell));
								$jjj++;
							}
							$vitri++;
						}
					} else {
						$vitri++;
					}
				}
			} else {
				$vitri++;
			}
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
		header('Content-Disposition: attachment;filename="products_options_' . $time . '_' . date('d_m_Y') . '.xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit();
	} else {
		$func->transfer("Dữ liệu rỗng", "index.php?com=export&act=man&type=" . $type, false);
	}
}
