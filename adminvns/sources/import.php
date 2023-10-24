<?php
	if(!defined('SOURCES')) die("Error");

	/* Kiểm tra active import */
	if(isset($config['product']))
	{
		$arrCheck = array();
		foreach($config['product'] as $k => $v) if(isset($v['import']) && $v['import'] == true) $arrCheck[] = $k;
		if(!count($arrCheck) || !in_array($type,$arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
	}
	else
	{
		$func->transfer("Trang không tồn tại", "index.php", false);
	}

	switch($act)
	{
		case "man":
			getImages();
			$template = "import/man/items";
			break;

		case "uploadImages":
			uploadImages();
			break;

		case "editImages":
			editImages();
			$template = "import/man/item_edit";
			break;

		case "saveImages":
			saveImages();
			break;

		case "deleteImages":
			deleteImages();
			break;

		case "uploadExcel":
			uploadExcel();
			break;

		default:
			$template = "404";
	}

	/* Get image */
	function getImages()
	{
		global $d, $func, $type, $curPage, $items, $paging;

		$per_page = 10;
		$startpoint = ($curPage * $per_page) - $per_page;
		$limit = " limit ".$startpoint.",".$per_page;
		$sql = "select * from #_excel where type = ? order by stt,id desc $limit";
		$items = $d->rawQuery($sql,array($type));
		$sqlNum = "select count(*) as 'num' from #_excel where type = ? order by stt,id desc";
		$count = $d->rawQueryOne($sqlNum,array($type));
		$total = $count['num'];
		$url = "index.php?com=import&act=man&type=".$type;
		$paging = $func->pagination($total,$per_page,$curPage,$url);
	}

	/* Edit image */
	function editImages()
	{
		global $d, $func, $item, $type, $curPage;

		$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=import&act=man&type=".$type."&p=".$curPage, false);

		$item = $d->rawQueryOne("select * from #_excel where id = ? and type = ? limit 0,1",array($id,$type));

		if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=import&act=man&type=".$type."&p=".$curPage, false);
	}

	/* Save image */
	function saveImages()
	{
		global $d, $item, $func, $type, $curPage, $config;

		if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=import&act=man&type=".$type."&p=".$curPage, false);

		$id = htmlspecialchars($_POST['id']);

		if($id)
		{
			if(isset($_FILES['file']))
			{
				$file_name = $func->uploadName($_FILES['file']["name"]);
				if($photo = $func->uploadImage("file", $config['import']['img_type'], UPLOAD_EXCEL, $file_name))
				{
					$data['photo'] = $photo;
					$row = $d->rawQueryOne("select id, photo from #_excel where id = ? and type = ? limit 0,1",array($id,$type));
					if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_EXCEL.$row['photo']);

					$d->where('id', $id);
					$d->where('type', $type);
					if($d->update('excel',$data)) $func->transfer("Cập nhật dữ liệu thành công", "index.php?com=import&act=man&type=".$type."&p=".$curPage);
					else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=import&act=man&type=".$type."&p=".$curPage, false);
				}
				else
				{
					$func->transfer("Không nhận được hình ảnh mới", "index.php?com=import&act=editImages&id=".$id."&type=".$type."&p=".$curPage, false);
				}
			}
		}
		else
		{
			$func->transfer("Không nhận được dữ liệu", "index.php?com=import&act=man&type=".$type."&p=".$curPage, false);
		}
	}

	/* Upload image */
	function uploadImages()
	{
		global $d, $type, $func, $config;

		if(isset($_POST['uploadImg']) && isset($_FILES['files']))
		{
			$arr_chuoi = '';
			$arr_file_del = array();

			if(isset($_POST['jfiler-items-exclude-files-0']))
			{
				$arr_chuoi = str_replace('"','',$_POST['jfiler-items-exclude-files-0']);
				$arr_chuoi = str_replace('[','',$arr_chuoi);
				$arr_chuoi = str_replace(']','',$arr_chuoi);
				$arr_chuoi = str_replace('\\','',$arr_chuoi);
				$arr_chuoi = str_replace('0://','',$arr_chuoi);
				$arr_file_del = explode(',',$arr_chuoi);
			}

			$dem = 0;
	        $myFile = $_FILES['files'];
	        $fileCount = count($myFile["name"]);

	        for($i=0; $i<$fileCount; $i++)
	        {
	        	if(!in_array($myFile["name"][$i], $arr_file_del, true))
	        	{
	        		$_FILES['file'] = array('name' => $myFile['name'][$i],'type' => $myFile['type'][$i],'tmp_name' => $myFile['tmp_name'][$i],'error' => $myFile['error'][$i],'size' => $myFile['size'][$i]);
	        		$file_name = $func->uploadName($myFile["name"][$i]);
	        		if($photo = $func->uploadImage("file", $config['import']['img_type'], UPLOAD_EXCEL, $file_name))
	        		{
	        			$data['photo'] = $photo;
	        			$data['stt'] = (isset($_POST['stt-filer'][$dem]) && $_POST['stt-filer'][$dem] > 0) ? (int)$_POST['stt-filer'][$dem] : 0;
	        			$data['type'] = $type;
	        			$d->insert('excel',$data);
	        		}
	        		$dem++;
	        	}
	        }
	        $func->transfer("Lưu hình ảnh thành công", "index.php?com=import&act=man&type=".$type);
	    }
	    else
	    {
	    	$func->transfer("Dữ liệu rỗng", "index.php?com=import&act=man&type=".$type, false);
	    }
	}

	/* Delete image */
	function deleteImages()
	{
		global $d, $type, $func, $curPage;

		$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

		if($id)
		{
			$row = $d->rawQueryOne("select id, photo from #_excel where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_EXCEL.$row['photo']);
				$d->rawQuery("delete from #_excel where id = ? and type = ?",array($id,$type));
				$func->transfer("Xóa dữ liệu thành công", "index.php?com=import&act=man&type=".$type."&p=".$curPage);
			}
			else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=import&act=man&type=".$type."&p=".$curPage, false);
		}
		elseif(isset($_GET['listid']))
		{
			$listid = explode(",",$_GET['listid']);

			for($i=0;$i<count($listid);$i++)
			{
				$id = htmlspecialchars($listid[$i]);
				$row = $d->rawQueryOne("select id, photo from #_excel where id = ? and type = ? limit 0,1",array($id,$type));

				if(isset($row['id']) && $row['id'] > 0)
				{
					$func->delete_file(UPLOAD_EXCEL.$row['photo']);
					$d->rawQuery("delete from #_excel where id = ? and type = ?",array($id,$type));
				}
			}

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=import&act=man&type=".$type."&p=".$curPage);
		}
		else $func->transfer("Không nhận được dữ liệu", "index.php?com=import&act=man&type=".$type."&p=".$curPage, false);
	}

	/* Transfer image */
	function transferphoto($photo)
	{
		global $d;

		$oldpath = UPLOAD_EXCEL.$photo;
		$newpath = UPLOAD_PRODUCT.$photo;

		if(file_exists($oldpath))
		{
			if(rename($oldpath,$newpath))
			{
				$d->rawQuery("delete from #_excel where photo = ?",array($photo));
			}
		}
	}

	/* Upload excel */
	function uploadExcel()
	{
		global $d, $type, $func, $config;

		if(isset($_POST['importExcel']))
		{
			$type2 = $_POST['type2'];
			$file_type = $_FILES['file-excel']['type'];

			if($file_type == "application/vnd.ms-excel" || $file_type == "application/x-ms-excel" || $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
			{
				$mess = '';
				$filename = $func->changeTitle($_FILES["file-excel"]["name"]);
				move_uploaded_file($_FILES["file-excel"]["tmp_name"],$filename);

				require LIBRARIES.'PHPExcel.php';
				require_once LIBRARIES.'PHPExcel/IOFactory.php';

				$objPHPExcel = PHPExcel_IOFactory::load($filename);

				foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
				{
					$worksheetTitle = $worksheet->getTitle();
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

					$nrColumns = ord($highestColumn) - 64;


					for($row=2;$row<=$highestRow;++$row)
					{
						$cell = $worksheet->getCellByColumnAndRow(0, $row);
						$masp = $cell->getValue();

						/* Lấy danh mục filter */
						$tenfilter = $d->rawQuery("select id,tenvi as ten from #_product_size where type = ? and type2 = ? order by id asc",array($type,$type2));
						$maxfilter = count($tenfilter);

						if($masp!="")
						{



							$giafilter =  array();

							$cell = $worksheet->getCellByColumnAndRow(0, $row);
							$masp = $cell->getValue();

							$cell = $worksheet->getCellByColumnAndRow(1, $row);
							$tenvi = $cell->getValue();
							$j = 2;
							for ($j=2; $j <=$maxfilter+1; $j++) {
								$cell = $worksheet->getCellByColumnAndRow($j, $row);
								array_push($giafilter,$cell->getValue());
							}

							/* Lấy sản phẩm theo mã */
							$proimport = $d->rawQueryOne("select id,id_$type2 from #_product where masp = ? limit 0,1",array($masp));



							$arrayfilterid = array();
							$arrayfilteridinsert = array();
							foreach ($tenfilter as $key => $value) {
								$arrayfilterid[$value['id']] = $giafilter[$key];
								array_push($arrayfilteridinsert,$value['id']);
							}
							$dataupdate = array();
							if(!empty($arrayfilteridinsert)){
								$stringfilteridinsert = implode(',',$arrayfilteridinsert);
								$dataupdate["id_$type2"] = $stringfilteridinsert;
								$d->where('id',$proimport['id']);
								$d->update('product',$dataupdate);

								foreach ($arrayfilteridinsert as $key => $value) {
									$sql = "select * from #_product_price where id_$type2 = ? and id_product = ? limit 0, 1";
									$param = array($value,$proimport['id']);
									$rowdetail = $d->rawQueryOne($sql,$param);
									if(!$rowdetail){
										if($arrayfilterid[$value] > 0){
											$datainsert["id_$type2"] = $value;
											$datainsert["id_product"] = $proimport['id'];
											$datainsert["gia"] = $arrayfilterid[$value];
											$datainsert["hienthi"] = 1;
											$datainsert["ngaytao"] = time();
											$datainsert["type"] = $type;
											$datainsert["type2"] = $type2;
											$d->insert('product_price',$datainsert);

										}
									}else{
										if(!empty($arrayfilterid[$value])) {
											$sql2 = "update #_product_price set gia = ? where id_product = ? and id_$type2 = ? ";
											$param2 = array( $arrayfilterid[$value],$rowdetail["id_product"],$rowdetail["id_$type2"]);
										}else{
											$sql2 = "update #_product_price set hienthi = 0 where id_product = ? and id_$type2 = ? ";
											$param2 = array($rowdetail["id_product"],$rowdetail["id_$type2"]);
										}
										$d->rawQueryOne($sql2,$param2);

									}

								}

							}


						}
					}
				}


				/* Kiểm tra kết quả import */
				if($mess == '')
				{
					$mess = "Import danh sách thành công";
					$func->transfer($mess, "index.php?com=import&act=man&type=".$type);
				}
				else
				{
					$func->transfer($mess, "index.php?com=import&act=man&type=".$type, false);
				}
			}
			else
			{
				$mess = "Không hỗ trợ kiểu tập tin này";
				$func->transfer($mess, "index.php?com=import&act=man&type=".$type, false);
			}
		}
		else
		{
			$func->transfer("Dữ liệu rỗng", "index.php?com=import&act=man&type=".$type, false);
		}
	}
?>