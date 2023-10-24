<?php
if(!defined('SOURCES')) die("Error");

/* Kiểm tra active product */
if(isset($config['product']))
{
	$arrCheck = array();
	foreach($config['product'] as $k => $v) $arrCheck[] = $k;
	if(!count($arrCheck) || !in_array($type,$arrCheck)) $func->transfer("Trang không tồn tại", "index.php", false);
}
else
{
	$func->transfer("Trang không tồn tại", "index.php", false);
}

/* Cấu hình đường dẫn trả về */
$strUrl = "";
$arrUrl = array('id_list','id_cat','id_item','id_sub','id_brand');
if(isset($_POST['data']))
{
	$dataUrl = isset($_POST['data']) ? $_POST['data'] : null;
	if($dataUrl)
	{
		foreach($arrUrl as $k => $v)
		{
			if(isset($dataUrl[$arrUrl[$k]])) $strUrl .= "&".$arrUrl[$k]."=".htmlspecialchars($dataUrl[$arrUrl[$k]]);
		}
	}
}
else
{
	foreach($arrUrl as $k => $v)
	{
		if(isset($_REQUEST[$arrUrl[$k]])) $strUrl .= "&".$arrUrl[$k]."=".htmlspecialchars($_REQUEST[$arrUrl[$k]]);
	}
	if(isset($_REQUEST['keyword'])) $strUrl .= "&keyword=".htmlspecialchars($_REQUEST['keyword']);
}

switch($act)
{
	/** options */
	case "options":
		get_item();
		$template = "product/options/index";
	break;
	/* Man */
	case "man":
	get_items();
	$template = "product/man/items";
	break;
	case "add":
	$template = "product/man/item_add";
	break;
	case "edit":
	case "copy":
	if((!isset($config['product'][$type]['copy']) || $config['product'][$type]['copy'] == false) && $act=='copy')
	{
		$template = "404";
		return false;
	}
	get_item();
	$template = "product/man/item_add";
	break;
	case "save":
	case "save_copy":
	save_item();
	break;
	case "delete":
	delete_item();
	break;
	
	/* Size */
	case "man_size":
	get_items_size();
	$template = "product/size/items";
	break;
	case "add_size":
	$template = "product/size/item_add";
	break;
	case "edit_size":
	get_item_size();
	$template = "product/size/item_add";
	break;
	case "save_size":
	save_item_size();
	break;
	case "delete_size":
	delete_item_size();
	break;
	/* Chất liệu */
	case "man_chatlieu":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_chatlieu":
	$template = "product/type2/item_add";
	break;
	case "edit_chatlieu":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_chatlieu":
	save_item_type2();
	break;
	case "delete_chatlieu":
	delete_item_type2();
	break;


	/* Số mặt */
	case "man_somat":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_somat":
	$template = "product/type2/item_add";
	break;
	case "edit_somat":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_somat":
	save_item_type2();
	break;
	case "delete_somat":
	delete_item_type2();
	break;
	/* Cán màng */
	case "man_canmang":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_canmang":
	$template = "product/type2/item_add";
	break;
	case "edit_canmang":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_canmang":
	save_item_type2();
	break;
	case "delete_canmang":
	delete_item_type2();
	break;
	/* Khoan lỗ */
	case "man_khoanlo":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_khoanlo":
	$template = "product/type2/item_add";
	break;
	case "edit_khoanlo":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_khoanlo":
	save_item_type2();
	break;
	case "delete_khoanlo":
	delete_item_type2();
	break;
	/* Số đường cứng */
	case "man_soduongcung":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_soduongcung":
	$template = "product/type2/item_add";
	break;
	case "edit_soduongcung":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_soduongcung":
	save_item_type2();
	break;
	case "delete_soduongcung":
	delete_item_type2();
	break;
	/* Số Hình dạng */
	case "man_hinhdang":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_hinhdang":
	$template = "product/type2/item_add";
	break;
	case "edit_hinhdang":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_hinhdang":
	save_item_type2();
	break;
	case "delete_hinhdang":
	delete_item_type2();
	break;
	/* Số Cách thức */
	case "man_cachthuc":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_cachthuc":
	$template = "product/type2/item_add";
	break;
	case "edit_cachthuc":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_cachthuc":
	save_item_type2();
	break;
	case "delete_cachthuc":
	delete_item_type2();
	break;
	/* Số Kiểu bế */
	case "man_kieube":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_kieube":
	$template = "product/type2/item_add";
	break;
	case "edit_kieube":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_kieube":
	save_item_type2();
	break;
	case "delete_kieube":
	delete_item_type2();
	break;
	/* Số Số lượng */
	case "man_soluong":
	get_items_type2();
	$template = "product/type2/items";
	break;
	case "add_soluong":
	$template = "product/type2/item_add";
	break;
	case "edit_soluong":
	get_item_type2();
	$template = "product/type2/item_add";
	break;
	case "save_soluong":
	save_item_type2();
	break;
	case "delete_soluong":
	delete_item_type2();
	break;
	/* Color */
	case "man_mau":
	get_items_mau();
	$template = "product/mau/items";
	break;
	case "add_mau":
	$template = "product/mau/item_add";
	break;
	case "edit_mau":
	get_item_mau();
	$template = "product/mau/item_add";
	break;
	case "save_mau":
	save_item_mau();
	break;
	case "delete_mau":
	delete_item_mau();
	break;

	/* Brand */
	case "man_brand":
	get_brands();
	$template = "product/brand/brand";
	break;
	case "add_brand":
	$template = "product/brand/brand_add";
	break;
	case "edit_brand":
	get_brand();
	$template = "product/brand/brand_add";
	break;
	case "save_brand":
	save_brand();
	break;
	case "delete_brand":
	delete_brand();
	break;

	/* List */
	case "man_list":
	get_lists();
	$template = "product/list/lists";
	break;
	case "add_list":
	$template = "product/list/list_add";
	break;
	case "edit_list":
	get_list();
	$template = "product/list/list_add";
	break;
	case "save_list":
	save_list();
	break;
	case "delete_list":
	delete_list();
	break;

	/* Cat */
	case "man_cat":
	get_cats();
	$template = "product/cat/cats";
	break;
	case "add_cat":
	$template = "product/cat/cat_add";
	break;
	case "edit_cat":
	get_cat();
	$template = "product/cat/cat_add";
	break;
	case "save_cat":
	save_cat();
	break;
	case "delete_cat":
	delete_cat();
	break;

	/* Item */
	case "man_item":
	get_loais();
	$template = "product/item/loais";
	break;
	case "add_item":
	$template = "product/item/loai_add";
	break;
	case "edit_item":
	get_loai();
	$template = "product/item/loai_add";
	break;
	case "save_item":
	save_loai();
	break;
	case "delete_item":
	delete_loai();
	break;

	/* Sub */
	case "man_sub":
	get_subs();
	$template = "product/sub/subs";
	break;
	case "add_sub":
	$template = "product/sub/sub_add";
	break;
	case "edit_sub":
	get_sub();
	$template = "product/sub/sub_add";
	break;
	case "save_sub":
	save_sub();
	break;
	case "delete_sub":
	delete_sub();
	break;

	/* Price */
	case "man_price":
	get_prices();
	$template = "product/price/prices";
	break;
	case "add_price":
	$template = "product/price/price_add";
	break;
	case "edit_price":
	get_price();
	$template = "product/price/price_add";
	break;
	case "save_price":
	save_price();
	break;
	case "delete_price":
	delete_price();
	break;

	/* Gallery */
	case "man_photo":
	case "add_photo":
	case "edit_photo":
	case "save_photo":
	case "delete_photo":
	include "gallery.php";
	break;

	default:
	$template = "404";
}

/* Get man */
function get_items()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";
	$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
	$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;
	$iditem = (isset($_REQUEST['id_item'])) ? htmlspecialchars($_REQUEST['id_item']) : 0;
	$idsub = (isset($_REQUEST['id_sub'])) ? htmlspecialchars($_REQUEST['id_sub']) : 0;
	$idbrand = (isset($_REQUEST['id_brand'])) ? htmlspecialchars($_REQUEST['id_brand']) : 0;
	$idhuong = (isset($_REQUEST['id_huong'])) ? htmlspecialchars($_REQUEST['id_huong']) : 0;
	$idtygia = (isset($_REQUEST['id_tygia'])) ? htmlspecialchars($_REQUEST['id_tygia']) : 0;
	$idtinhthanh = (isset($_REQUEST['id_tinhthanh'])) ? htmlspecialchars($_REQUEST['id_tinhthanh']) : 0;
	$idthuonghieu = (isset($_REQUEST['id_thuonghieu'])) ? htmlspecialchars($_REQUEST['id_thuonghieu']) : 0;

	if($idlist) $where .= " and id_list=$idlist";
	if($idcat) $where .= " and id_cat=$idcat";
	if($iditem) $where .= " and id_item=$iditem";
	if($idsub) $where .= " and id_sub=$idsub";
	if($idbrand) $where .= " and id_brand=$idbrand";
	if($idhuong) $where .= " and id_huong=$idhuong";
	if($idtinhthanh) $where .= " and id_tinhthanh=$idtinhthanh";
	if($idthuonghieu) $where .= " and id_thuonghieu=$idthuonghieu";
	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man".$strUrl."&type=".$type;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit man */
function get_item()
{
	global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com, $act;

	$id = 0;
	if(isset($_GET['id'])) $id = htmlspecialchars($_GET['id']);
	if(isset($_GET['id_copy'])) $id = htmlspecialchars($_GET['id_copy']);

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);

	$item = $d->rawQueryOne("select * from #_product where id = ? and type = ? limit 0,1",array($id,$type));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);

	/* Lấy hình ảnh con */
	if($act != 'copy')
	{
		$gallery = $d->rawQuery("select * from #_gallery where id_photo = ? and com = ? and type = ? and kind = ? and val = ? order by stt,id desc",array($id,$com,$type,'man',$type));
	}
}

/* Save man */
function save_item()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $act, $type;

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		if(isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if(isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';

		if(isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true)
		{
			if(isset($_POST['size_group']) && ($_POST['size_group'] != '')) $data['id_size'] = implode(",", $_POST['size_group']);
			else $data['id_size'] = "";
		}
		if(isset($config['product'][$type]['chatlieu']) && $config['product'][$type]['chatlieu'] == true)
		{
			if(isset($_POST['chatlieu_group']) && ($_POST['chatlieu_group'] != '')) $data['id_chatlieu'] = implode(",", $_POST['chatlieu_group']);
			else $data['id_chatlieu'] = "";
		}
		if(isset($config['product'][$type]['somat']) && $config['product'][$type]['somat'] == true)
		{
			if(isset($_POST['somat_group']) && ($_POST['somat_group'] != '')) $data['id_somat'] = implode(",", $_POST['somat_group']);
			else $data['id_somat'] = "";
		}
		if(isset($config['product'][$type]['canmang']) && $config['product'][$type]['canmang'] == true)
		{
			if(isset($_POST['canmang_group']) && ($_POST['canmang_group'] != '')) $data['id_canmang'] = implode(",", $_POST['canmang_group']);
			else $data['id_canmang'] = "";
		}
		if(isset($config['product'][$type]['khoanlo']) && $config['product'][$type]['khoanlo'] == true)
		{
			if(isset($_POST['khoanlo_group']) && ($_POST['khoanlo_group'] != '')) $data['id_khoanlo'] = implode(",", $_POST['khoanlo_group']);
			else $data['id_khoanlo'] = "";
		}
		if(isset($config['product'][$type]['soduongcung']) && $config['product'][$type]['soduongcung'] == true)
		{
			if(isset($_POST['soduongcung_group']) && ($_POST['soduongcung_group'] != '')) $data['id_soduongcung'] = implode(",", $_POST['soduongcung_group']);
			else $data['id_soduongcung'] = "";
		}
		if(isset($config['product'][$type]['hinhdang']) && $config['product'][$type]['hinhdang'] == true)
		{
			if(isset($_POST['hinhdang_group']) && ($_POST['hinhdang_group'] != '')) $data['id_hinhdang'] = implode(",", $_POST['hinhdang_group']);
			else $data['id_hinhdang'] = "";
		}
		if(isset($config['product'][$type]['cachthuc']) && $config['product'][$type]['cachthuc'] == true)
		{
			if(isset($_POST['cachthuc_group']) && ($_POST['cachthuc_group'] != '')) $data['id_cachthuc'] = implode(",", $_POST['cachthuc_group']);
			else $data['id_cachthuc'] = "";
		}
		if(isset($config['product'][$type]['kieube']) && $config['product'][$type]['kieube'] == true)
		{
			if(isset($_POST['kieube_group']) && ($_POST['kieube_group'] != '')) $data['id_kieube'] = implode(",", $_POST['kieube_group']);
			else $data['id_kieube'] = "";
		}
		if(isset($config['product'][$type]['soluong']) && $config['product'][$type]['soluong'] == true)
		{
			if(isset($_POST['soluong_group']) && ($_POST['soluong_group'] != '')) $data['id_soluong'] = implode(",", $_POST['soluong_group']);
			else $data['id_soluong'] = "";
		}

		if(isset($config['product'][$type]['mau']) && $config['product'][$type]['mau'] == true)
		{
			if(isset($_POST['mau_group']) && ($_POST['mau_group'] != '')) $data['id_mau'] = implode(",", $_POST['mau_group']);
			else $data['id_mau'] = "";
		}

		if(isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true)
		{
			if(isset($_POST['tags_group']) && ($_POST['tags_group'] != '')) $data['id_tags'] = implode(",", $_POST['tags_group']);
			else $data['id_tags'] = "";
		}

		$data['gia'] = (isset($data['gia']) && $data['gia'] != '') ? str_replace(",","",$data['gia']) : 0;
		$data['giamoi'] = (isset($data['giamoi']) && $data['giamoi'] != '') ? str_replace(",","",$data['giamoi']) : 0;

		if($data['id_tygia']){
			$tygia = $func->get_search_index($data['id_tygia'],'tygia');
			$giaso = $tygia['tygia'];
			$data['giaso'] = $data['giatext'] * $giaso;
		}

		$data['giakm'] = (isset($data['giakm']) && $data['giakm'] != '') ? $data['giakm'] : 0;
		$data['giatext'] = (isset($data['giatext']) && $data['giatext'] != '') ? $data['giatext'] : 0;
		$data['dientich'] = (isset($data['dientich']) && $data['dientich'] != '') ? $data['dientich'] : 0;
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}
	$savehere = (isset($_POST['save-here'])) ? true : false;
	$buildSchema = (isset($_POST['build-schema'])) ? true : false;

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	/* Post seo */
	if(isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true)
	{
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if($dataSeo)
		{
			foreach($dataSeo as $column => $value)
			{
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	if($id && $act!='save_copy')
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			}
		}

		if(isset($_FILES['file2']))
		{
			$file_name2 = $func->uploadName($_FILES['file2']["name"]);
			if($photo = $func->uploadImage("file2", $config['product'][$type]['img_type'], UPLOAD_PRODUCT,$file_name2))
			{
				$data['photo2'] = $photo;
				$row = $d->rawQueryOne("select id, photo2 from #_product where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_PRODUCT.$row['photo2']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product',$data))
		{
			/* SEO */
			if(isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true)
			{
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man',$type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			if($savehere) $func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id);
			else $func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
		}
		else
		{

			if($savehere) $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id, false);
			else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
		}
	}
	else
	{

		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
			}
		}

		if(isset($_FILES['file2']))
		{
			$file_name2 = $func->uploadName($_FILES['file2']["name"]);
			if($photo = $func->uploadImage("file2", $config['product'][$type]['img_type'], UPLOAD_PRODUCT,$file_name2))
			{
				$data['photo2'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if($d->insert('product',$data))
		{
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if(isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true)
			{
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			/* Cập nhật hash khi upload multi */
			$hash = (isset($_POST['hash']) && $_POST['hash'] != '') ? addslashes($_POST['hash']) : null;
			if($hash)
			{
				$d->rawQuery("update #_gallery set hash = ?, id_photo = ? where hash = ?",array('',$id_insert,$hash));
			}

			if($act=='save_copy')
			{
				if($savehere) $func->transfer("Sao chép dữ liệu thành công", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id_insert);
				else $func->transfer("Sao chép dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
			}
			else
			{
				if($savehere) $func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id_insert);
				else $func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
			}
		}
		else
		{

			if($act=='save_copy')
			{
				if($savehere) $func->transfer("Sao chép dữ liệu bị lỗi", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id_insert, false);
				else $func->transfer("Sao chép dữ liệu bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
			}
			else
			{
				if($savehere) $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=edit&type=".$type."&p=".$curPage.$strUrl."&id=".$id_insert, false);
				else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
			}
		}
	}
}

/* Delete man */
function delete_item()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man',$type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			$d->rawQuery("delete from #_product where id = ?",array($id));

			/* Xóa gallery */
			$row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man',$com));

			if(count($row))
			{
				foreach($row as $v)
				{
					$func->delete_file(UPLOAD_PRODUCT.$v['photo']);
					$func->delete_file(UPLOAD_FILE.$v['taptin']);
				}

				$d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man',$com));
			}

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man',$type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product where id = ?",array($id));

				/* Xóa gallery */
				$row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man',$com));

				if(count($row))
				{
					foreach($row as $v)
					{
						$func->delete_file(UPLOAD_PRODUCT.$v['photo']);
						$func->delete_file(UPLOAD_FILE.$v['taptin']);
					}

					$d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man',$com));
				}
			}
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Get size */
function get_items_size()
{
	global $d, $func, $curPage, $items,$strUrl, $paging, $type;

	$where = "";

	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_size where type = ? $where and type2 = 'size' order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product_size where type = ? $where and type2 = 'size'  order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_size&".$strUrl."&type=".$type;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit size */
function get_item_size()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage, false);

	$item = $d->rawQueryOne("select * from #_product_size where id = ? limit 0,1",array($id));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage, false);
}

/* Save size */
function save_item_size()
{
	global $d, $func, $curPage, $config, $type;

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$data['type2'] = 'size';
	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if($id)
	{
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_size',$data)) $func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage, false);
	}
	else
	{
		$data['ngaytao'] = time();

		if($d->insert('product_size',$data)) $func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage, false);
	}
}

/* Delete size */
function delete_item_size()
{
	global $d, $func, $curPage, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		$row = $d->rawQueryOne("select id from #_product_size where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$d->rawQuery("delete from #_product_size where id = ? and type = ?",array($id,$type));
			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from #_product_size where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0) $d->rawQuery("delete from #_product_size where id = ? and type = ?",array($id,$type));
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size&type=".$type."&p=".$curPage, false);
}

/* Get color */
function get_items_mau()
{
	global $d, $func, $curPage, $items, $paging, $type;

	$where = "";

	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_mau where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product_mau where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_mau&type=".$type;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit color */
function get_item_mau()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage, false);

	$item = $d->rawQueryOne("select * from #_product_mau where id = ? limit 0,1",array($id));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage, false);
}

/* Save color */
function save_item_mau()
{
	global $d, $func, $curPage, $config, $type;

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if($id)
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_mau'], UPLOAD_COLOR,$file_name))
			{
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product_mau where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_COLOR.$row['photo']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_mau',$data)) $func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage, false);
	}
	else
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_mau'], UPLOAD_COLOR,$file_name))
			{
				$data['photo'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if($d->insert('product_mau',$data)) $func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage, false);
	}
}

/* Delete color */
function delete_item_mau()
{
	global $d, $curPage, $func, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		$row = $d->rawQueryOne("select * from #_product_mau where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$func->delete_file(UPLOAD_COLOR.$row['photo']);
			$d->rawQuery("delete from #_product_mau where id = ?",array($id));

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select * from #_product_mau where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_COLOR.$row['photo']);
				$d->rawQuery("delete from #_product_mau where id = ?",array($id));
			}
		}
		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_mau&type=".$type."&p=".$curPage, false);
}

/* Get list */
function get_lists()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";

	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_list where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product_list where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_list&type=".$type;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit list */
function get_list()
{
	global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);

	/* Lấy hình ảnh con */
	$gallery = $d->rawQuery("select * from #_gallery where id_photo = ? and com = ? and type = ? and kind = ? and val = ? order by stt,id desc",array($id,$com,$type,'man_list',$type));
}

/* Save list */
function save_list()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $type;

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		if(isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if(isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	/* Post seo */
	if(isset($config['product'][$type]['seo_list']) && $config['product'][$type]['seo_list'] == true)
	{
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if($dataSeo)
		{
			foreach($dataSeo as $column => $value)
			{
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	if($id)
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_list'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			}
		}

		if(isset($_FILES['file2']))
		{
			$file_name2 = $func->uploadName($_FILES['file2']["name"]);
			if($photo = $func->uploadImage("file2", $config['product'][$type]['img_type_list'], UPLOAD_PRODUCT,$file_name2))
			{
				$data['photo2'] = $photo;
				$row = $d->rawQueryOne("select id, photo2 from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_PRODUCT.$row['photo2']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_list',$data))
		{
			/* SEO */
			if(isset($config['product'][$type]['seo_list']) && $config['product'][$type]['seo_list'] == true)
			{
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_list',$type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_list';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
	}
	else
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_list'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
			}
		}

		if(isset($_FILES['file2']))
		{
			$file_name2 = $func->uploadName($_FILES['file2']["name"]);
			if($photo = $func->uploadImage("file2", $config['product'][$type]['img_type_list'], UPLOAD_PRODUCT,$file_name2))
			{
				$data['photo2'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if($d->insert('product_list',$data))
		{
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if(isset($config['product'][$type]['seo_list']) && $config['product'][$type]['seo_list'] == true)
			{
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_list';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			/* Cập nhật hash khi upload multi */
			$hash = (isset($_POST['hash']) && $_POST['hash'] != '') ? addslashes($_POST['hash']) : null;
			if($hash)
			{
				$d->rawQuery("update #_gallery set hash = ?, id_photo = ? where hash = ?",array('',$id_insert,$hash));
			}

			$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
	}
}

/* Delete list */
function delete_list()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_list',$type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo, photo2 from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			$func->delete_file(UPLOAD_PRODUCT.$row['photo2']);
			$d->rawQuery("delete from #_product_list where id = ?",array($id));

			/* Xóa gallery */
			$row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man_list',$com));

			if(count($row))
			{
				foreach($row as $v)
				{
					$func->delete_file(UPLOAD_PRODUCT.$v['photo']);
					$func->delete_file(UPLOAD_FILE.$v['taptin']);
				}

				$d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man_list',$com));
			}

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_list',$type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo, photo2 from #_product_list where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
				$func->delete_file(UPLOAD_PRODUCT.$row['photo2']);
				$d->rawQuery("delete from #_product_list where id = ?",array($id));

				/* Xóa gallery */
				$row = $d->rawQuery("select id, photo, taptin from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man_list',$com));

				if(count($row))
				{
					foreach($row as $v)
					{
						$func->delete_file(UPLOAD_PRODUCT.$v['photo']);
						$func->delete_file(UPLOAD_FILE.$v['taptin']);
					}

					$d->rawQuery("delete from #_gallery where id_photo = ? and kind = ? and com = ?",array($id,'man_list',$com));
				}
			}
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Get cat */
function get_cats()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";
	$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;

	if($idlist) $where .= " and id_list=$idlist";
	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_cat where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product_cat where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_cat".$strUrl."&type=".$type;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit cat */
function get_cat()
{
	global $d, $func, $strUrl, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_cat where id = ? and type = ? limit 0,1",array($id,$type));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Save cat */
function save_cat()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $type;

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		if(isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if(isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	/* Post seo */
	if(isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true)
	{
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if($dataSeo)
		{
			foreach($dataSeo as $column => $value)
			{
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if($id)
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_cat'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product_cat where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_cat',$data))
		{
			/* SEO */
			if(isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true)
			{
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_cat',$type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_cat';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
	}
	else
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_cat'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if($d->insert('product_cat',$data))
		{
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if(isset($config['product'][$type]['seo_cat']) && $config['product'][$type]['seo_cat'] == true)
			{
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_cat';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}
			$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
	}
}

/* Delete cat */
function delete_cat()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_cat',$type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_cat where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			$d->rawQuery("delete from #_product_cat where id = ?",array($id));

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_cat',$type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_cat where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product_cat where id = ?",array($id));
			}
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Get item */
function get_loais()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";
	$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
	$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;

	if($idlist) $where .= " and id_list=$idlist";
	if($idcat) $where .= " and id_cat=$idcat";
	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_item where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product_item where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_item".$strUrl."&type=".$type;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit item */
function get_loai()
{
	global $d, $func, $strUrl, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_item where id = ? and type = ? limit 0,1",array($id,$type));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Save item */
function save_loai()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $type;

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		if(isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if(isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	/* Post seo */
	if(isset($config['product'][$type]['seo_item']) && $config['product'][$type]['seo_item'] == true)
	{
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if($dataSeo)
		{
			foreach($dataSeo as $column => $value)
			{
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if($id)
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_item'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product_item where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_item',$data))
		{
			/* SEO */
			if(isset($config['product'][$type]['seo_item']) && $config['product'][$type]['seo_item'] == true)
			{
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_item',$type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_item';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl, false);
	}
	else
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_item'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if($d->insert('product_item',$data))
		{
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if(isset($config['product'][$type]['seo_item']) && $config['product'][$type]['seo_item'] == true)
			{
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_item';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl, false);
	}
}

/* Delete item */
function delete_loai()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_item',$type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_item where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			$d->rawQuery("delete from #_product_item where id = ?",array($id));

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_item',$type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_item where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product_item where id = ?",array($id));
			}
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Get sub */
function get_subs()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";

	$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
	$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;
	$iditem = (isset($_REQUEST['id_item'])) ? htmlspecialchars($_REQUEST['id_item']) : 0;

	if($idlist) $where .= " and id_list=$idlist";
	if($idcat) $where .= " and id_cat=$idcat";
	if($iditem) $where .= " and id_item=$iditem";
	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_sub where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product_sub where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_sub".$strUrl."&type=".$type;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit sub */
function get_sub()
{
	global $d, $func, $strUrl, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_sub where id = ? and type = ? limit 0,1",array($id,$type));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Save sub */
function save_sub()
{
	global $d, $strUrl, $func, $curPage, $config, $com, $type;

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		if(isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if(isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	/* Post seo */
	if(isset($config['product'][$type]['seo_sub']) && $config['product'][$type]['seo_sub'] == true)
	{
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if($dataSeo)
		{
			foreach($dataSeo as $column => $value)
			{
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if($id)
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_sub'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product_sub where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_sub',$data))
		{
			/* SEO */
			if(isset($config['product'][$type]['seo_sub']) && $config['product'][$type]['seo_sub'] == true)
			{
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_sub',$type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_sub';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl, false);
	}
	else
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_sub'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if($d->insert('product_sub',$data))
		{
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if(isset($config['product'][$type]['seo_sub']) && $config['product'][$type]['seo_sub'] == true)
			{
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_sub';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl, false);
	}
}

/* Delete sub */
function delete_sub()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_sub',$type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_sub where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			$d->rawQuery("delete from #_product_sub where id = ?",array($id));

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_sub',$type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_sub where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product_sub where id = ?",array($id));
			}
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_sub&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Get brand */
function get_brands()
{
	global $d, $func, $strUrl, $curPage, $items, $paging, $type;

	$where = "";

	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}

	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_brand where type = ? $where order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product_brand where type = ? $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_brand&type=".$type;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit brand */
function get_brand()
{
	global $d, $func, $strUrl, $curPage, $item, $gallery, $type, $com;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage.$strUrl, false);

	$item = $d->rawQueryOne("select * from #_product_brand where id = ? and type = ? limit 0,1",array($id,$type));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Save brand */
function save_brand()
{
	global $d, $curPage, $func, $config, $com, $type;

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		if(isset($_POST['slugvi'])) $data['tenkhongdauvi'] = $func->changeTitle(htmlspecialchars($_POST['slugvi']));
		else $data['tenkhongdauvi'] = (isset($data['tenvi'])) ? $func->changeTitle($data['tenvi']) : '';
		if(isset($_POST['slugen'])) $data['tenkhongdauen'] = $func->changeTitle(htmlspecialchars($_POST['slugen']));
		else $data['tenkhongdauen'] = (isset($data['tenen'])) ? $func->changeTitle($data['tenen']) : '';
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	/* Post seo */
	if(isset($config['product'][$type]['seo_brand']) && $config['product'][$type]['seo_brand'] == true)
	{
		$dataSeo = (isset($_POST['dataSeo'])) ? $_POST['dataSeo'] : null;
		if($dataSeo)
		{
			foreach($dataSeo as $column => $value)
			{
				$dataSeo[$column] = htmlspecialchars($value);
			}
		}
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if($id)
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_brand'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
				$row = $d->rawQueryOne("select id, photo from #_product_brand where id = ? and type = ? limit 0,1",array($id,$type));
				if(isset($row['id']) && $row['id'] > 0) $func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			}
		}

		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_brand',$data))
		{
			/* SEO */
			if(isset($config['product'][$type]['seo_brand']) && $config['product'][$type]['seo_brand'] == true)
			{
				$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_brand',$type));

				$dataSeo['idmuc'] = $id;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_brand';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			$func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage);
		}
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage, false);
	}
	else
	{
		if(isset($_FILES['file']))
		{
			$file_name = $func->uploadName($_FILES['file']["name"]);
			if($photo = $func->uploadImage("file", $config['product'][$type]['img_type_brand'], UPLOAD_PRODUCT,$file_name))
			{
				$data['photo'] = $photo;
			}
		}

		$data['ngaytao'] = time();

		if($d->insert('product_brand',$data))
		{
			$id_insert = $d->getLastInsertId();

			/* SEO */
			if(isset($config['product'][$type]['seo_brand']) && $config['product'][$type]['seo_brand'] == true)
			{
				$dataSeo['idmuc'] = $id_insert;
				$dataSeo['com'] = $com;
				$dataSeo['act'] = 'man_brand';
				$dataSeo['type'] = $type;
				$d->insert('seo',$dataSeo);
			}

			$func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage);
		}
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage, false);
	}
}

/* Delete brand */
function delete_brand()
{
	global $d, $strUrl, $func, $curPage, $com, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		/* Xóa SEO */
		$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_brand',$type));

		/* Lấy dữ liệu */
		$row = $d->rawQueryOne("select id, photo from #_product_brand where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
			$d->rawQuery("delete from #_product_brand where id = ?",array($id));

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage.$strUrl);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage.$strUrl, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);

			/* Xóa SEO */
			$d->rawQuery("delete from #_seo where idmuc = ? and com = ? and act = ? and type = ?",array($id,$com,'man_brand',$type));

			/* Lấy dữ liệu */
			$row = $d->rawQueryOne("select id, photo from #_product_brand where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_PRODUCT.$row['photo']);
				$d->rawQuery("delete from #_product_brand where id = ?",array($id));
			}
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage.$strUrl);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_brand&type=".$type."&p=".$curPage.$strUrl, false);
}

/* Get price */
function get_prices()
{
	global $d, $func, $curPage, $items, $paging, $type, $type2,  $idc;

	$where = "and id_product = ".$idc;

	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}
	if(isset($_REQUEST['id_mau']))
	{
		$id_mau = htmlspecialchars($_REQUEST['id_mau']);
		$where .= " and (id_mau = $id_mau)";
	}
	if(isset($_REQUEST['id_size']))
	{
		$id_size = htmlspecialchars($_REQUEST['id_size']);
		$where .= " and (id_size = $id_size)";
	}
	if(isset($_REQUEST['type2']))
	{
		$type2 = htmlspecialchars($_REQUEST['type2']);
		$where .= " and type2 = '$type2'";
	}
	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_price where type = ? $where order by stt,id desc $limit";

	$items = $d->rawQuery($sql,array($type));
	$sqlNum = "select count(*) as 'num' from #_product_price where type = ?  $where order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_price&type=".$type."&idc=".$idc;
	$paging = $func->pagination($total,$per_page,$curPage,$url);
}

/* Edit price */
function get_price()
{
	global $d, $func, $curPage, $item, $type;

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;
	$idc = (isset($_GET['idc'])) ? htmlspecialchars($_GET['idc']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_price&type=".$type."&idc=".$idc."&p=".$curPage, false);

	$item = $d->rawQueryOne("select * from #_product_price where id = ? limit 0,1",array($id));
	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_price&type=".$type."&idc=".$idc."&p=".$curPage, false);
}

/* Save price */
function save_price()
{
	global $d, $func, $curPage, $config, $type,$type2, $idc;

	$type2 = (isset($_REQUEST['type2'])) ? htmlspecialchars($_REQUEST['type2']) : '';

	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		$data['gia'] = (isset($data['gia']) && $data['gia'] != '') ? str_replace(",","",$data['gia']) : 0;
		$data['giamoi'] = (isset($data['giamoi']) && $data['giamoi'] != '') ? str_replace(",","",$data['giamoi']) : 0;
		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
		$data['type2'] = $type2;
		$data['id_product'] = $idc;
	}

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if($id)
	{
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_price',$data)) $func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage, false);
	}
	else
	{
		$data['ngaytao'] = time();

		if($d->insert('product_price',$data)) $func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage, false);
	}
}

/* Delete price */
function delete_price()
{
	global $d, $curPage, $func,$type2, $type;

	$type2 = (isset($_REQUEST['type2'])) ? htmlspecialchars($_REQUEST['type2']) : '';

	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;
	$idc = (isset($_GET['idc'])) ? htmlspecialchars($_GET['idc']) : 0;

	if($id)
	{
		$row = $d->rawQueryOne("select * from #_product_price where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$func->delete_file(UPLOAD_COLOR.$row['photo']);
			$d->rawQuery("delete from #_product_price where id = ?",array($id));

			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select * from #_product_price where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0)
			{
				$func->delete_file(UPLOAD_COLOR.$row['photo']);
				$d->rawQuery("delete from #_product_price where id = ?",array($id));
			}
		}
		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_price&type=".$type."&type2=".$type2."&idc=".$idc."&p=".$curPage, false);
}

/* Get Type 2*/
function get_items_type2()
{
	global $d, $func, $curPage, $items,$strUrl, $paging, $type, $type2;

	$where = "";

	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$where .= " and (tenvi LIKE '%$keyword%' or tenen LIKE '%$keyword%')";
	}
	$type2 = $_REQUEST['type2'];
	$per_page = 10;
	$startpoint = ($curPage * $per_page) - $per_page;
	$limit = " limit ".$startpoint.",".$per_page;
	$sql = "select * from #_product_size where type = ? $where and type2 = '$type2' order by stt,id desc $limit";
	$items = $d->rawQuery($sql,array($type));

	$sqlNum = "select count(*) as 'num' from #_product_size where type = ? $where and type2 = '$type2' order by stt,id desc";
	$count = $d->rawQueryOne($sqlNum,array($type));
	$total = $count['num'];
	$url = "index.php?com=product&act=man_$type2".$strUrl."&type=".$type."&type2=".$type2;
	$paging = $func->pagination($total,$per_page,$curPage,$url);

}

/* Edit Type 2*/
function get_item_type2()
{
	global $d, $func, $curPage, $item, $type, $type2;

	$type2 = $_REQUEST['type2'];
	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage, false);

	$item = $d->rawQueryOne("select * from #_product_size where id = ? limit 0,1",array($id));

	if(!$item['id']) $func->transfer("Dữ liệu không có thực", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage, false);
}

/* Save Type 2*/
function save_item_type2()
{
	global $d, $func, $curPage, $config, $type, $type2;

	$type2 = $_REQUEST['type2'];
	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage, false);

	/* Post dữ liệu */
	$data = (isset($_POST['data'])) ? $_POST['data'] : null;
	if($data)
	{
		foreach($data as $column => $value)
		{
			$data[$column] = htmlspecialchars($value);
		}

		$data['hienthi'] = (isset($data['hienthi'])) ? 1 : 0;
		$data['type'] = $type;
	}

	$data['type2'] = $type2;

	$id = (isset($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

	if($id)
	{
		$data['ngaysua'] = time();

		$d->where('id', $id);
		$d->where('type', $type);
		if($d->update('product_size',$data)) $func->transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage);
		else $func->transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage, false);
	}
	else
	{
		$data['ngaytao'] = time();

		if($d->insert('product_size',$data)) $func->transfer("Lưu dữ liệu thành công", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage);
		else $func->transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage, false);
	}
}

/* Delete Type 2*/
function delete_item_type2()
{
	global $d, $func, $curPage, $type, $type2;

	$type2 = $_REQUEST['type2'];
	$id = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

	if($id)
	{
		$row = $d->rawQueryOne("select id from #_product_size where id = ? and type = ? limit 0,1",array($id,$type));

		if(isset($row['id']) && $row['id'] > 0)
		{
			$d->rawQuery("delete from #_product_size where id = ? and type = ?",array($id,$type));
			$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage);
		}
		else $func->transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage, false);
	}
	elseif(isset($_GET['listid']))
	{
		$listid = explode(",",$_GET['listid']);

		for($i=0;$i<count($listid);$i++)
		{
			$id = htmlspecialchars($listid[$i]);
			$row = $d->rawQueryOne("select id from #_product_size where id = ? and type = ? limit 0,1",array($id,$type));

			if(isset($row['id']) && $row['id'] > 0) $d->rawQuery("delete from #_product_size where id = ? and type = ?",array($id,$type));
		}

		$func->transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage);
	}
	else $func->transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_$type2&type=".$type."&type2=".$type2."&p=".$curPage, false);
}
?>