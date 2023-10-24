<?php
if(!defined('SOURCES')) die("Error");

$slider = $d->rawQuery("select ten$lang as ten, photo,mota$lang as mota, link from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('slide'));

$gioithieu = $d->rawQueryOne("select id, type, ten$lang as ten, mota$lang as mota, photo, ngaytao, ngaysua from #_static where type = ? and hienthi > 0 limit 0,1",array('gioi-thieu'));

    // $brand = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id, photo from #_product_brand where type = ? and hienthi > 0 order by stt,id desc",array('san-pham'));

$tintucnb = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, mota$lang as mota, ngaytao, id, photo from #_news where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc",array('tin-tuc'));

$thuvienanh = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, mota$lang as mota, ngaytao, id, photo from #_product where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc limit 0,5",array('thu-vien-anh'));


$videonb = $d->rawQuery("select id from #_photo where noibat > 0 and type = ? and hienthi > 0",array('video'));

$doitac = $d->rawQuery("select ten$lang as ten, link, photo from #_photo where type = ? and hienthi > 0 order by stt, id desc",array('doitac'));

$popup = $d->rawQueryOne("select ten$lang as ten, photo, link, hienthi from #_photo where type = ? and act = ? limit 0,1",array('popup','photo_static'));


$visao = $d->rawQueryOne("select ten$lang as ten, photo, link, hienthi from #_photo where hienthi > 0 and type = ? and act = ? limit 0,1",array('vi-sao','photo_static'));
$buoc = $d->rawQuery("select ten$lang as ten, tenkhongdauvi, tenkhongdauen, mota$lang as mota, ngaytao, id, photo from #_news where type = ? and hienthi > 0 order by stt,id desc",array('quy-trinh'));
$anphamnb = $d->rawQuery("select tenkhongdauvi,tenkhongdauen,ten$lang as ten,photo, gia,donvi,id from #_product where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc",array('an-pham'));
$cuahangnb = $d->rawQuery("select tenkhongdauvi,tenkhongdauen,ten$lang as ten,photo, gia,donvi,id from #_product where type = ? and noibat > 0 and hienthi > 0",array('cua-hang'));
$quangcao = $d->rawQuery("select ten$lang as ten, photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('banner-qc'));
$danhmuc2sanphamnb = $d->rawQuery("select ten$lang as ten,photo, tenkhongdauvi, tenkhongdauen, id, noibat from #_product_cat where type = ? and noibat > 0 and hienthi > 0 order by stt,id desc",array('an-pham'));
$gif1 = $d->rawQueryOne("select id, photo from #_photo where type = ? and act = ? and hienthi > 0 limit 0,1",array('anh-gif','photo_static'));
$visao2 = $d->rawQuery("select ten$lang as ten, photo,mota$lang as mota, link from #_photo where type = ? and hienthi > 0 order by stt,id desc",array('vi-sao2'));

/* SEO */
$seoDB = $seo->getSeoDB(0,'setting','capnhat','setting');
$seo->setSeo('h1',$seoDB['title'.$seolang]);
$seo->setSeo('title',$seoDB['title'.$seolang]);
$seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
$seo->setSeo('description',$seoDB['description'.$seolang]);
$seo->setSeo('url',$func->getPageURL());
$img_json_bar = (isset($logo['options']) && $logo['options'] != '') ? json_decode($logo['options'],true) : null;
if($img_json_bar == null || ($img_json_bar['p'] != $logo['photo']))
{
    $img_json_bar = $func->getImgSize($logo['photo'],UPLOAD_PHOTO_L.$logo['photo']);
    $seo->updateSeoDB(json_encode($img_json_bar),'photo',$logo['id']);
}
$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_PHOTO_L.$logo['photo']);
$seo->setSeo('photo:width',$img_json_bar['w']);
$seo->setSeo('photo:height',$img_json_bar['h']);
$seo->setSeo('photo:type',$img_json_bar['m']);
?>