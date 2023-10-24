<?php 
include "ajax_config.php";

/* Paginations */

$size = (isset($_GET['size']) && $_GET['size'] > 0) ? htmlspecialchars($_GET['size']) : 0;
$product = (isset($_GET['product']) && $_GET['product'] > 0) ? htmlspecialchars($_GET['product']) : 0;
$type = (isset($_GET['type']) && $_GET['type'] > 0) ? htmlspecialchars($_GET['type']) : 0;


$getprice_size_loai = $d->rawQueryOne("select gia, giamoi from #_product_price where id_size = ? and id_product = ? and type = ? and hienthi > 0 order by stt,id desc",array($size,$product,$type));

$getprice = $d->rawQueryOne("select gia, giamoi from #_product where id = ? and type = ? and hienthi > 0 order by stt,id desc",array($product,$type));

?>
<?php if($getprice_size_loai['giamoi'] && $getprice_size_loai['gia']) {?>
	
	<span class="price-new-pro-detail"><?=$func->format_money($getprice_size_loai['giamoi'])?></span>
	<span class="price-old-pro-detail"><?=$func->format_money($getprice_size_loai['gia'])?></span>
<?php }elseif($getprice_size_loai['giamoi']){?>
	<span class="price-new-pro-detail"><?=$func->format_money($getprice_size_loai['giamoi'])?></span>
	<span class="price-old-pro-detail"><?=$func->format_money($getprice['gia'])?></span>
<?php }elseif($getprice_size_loai['gia']){?>
	<span class="price-new-pro-detail"><?=$func->format_money($getprice_size_loai['gia'])?></span>
<?php }elseif($getprice['giamoi']){?>
	<span class="price-new-pro-detail"><?=$func->format_money($getprice['giamoi'])?></span>
	<span class="price-old-pro-detail"><?=$func->format_money($getprice['gia'])?></span>
<?php }else{?>
	<span class="price-new-pro-detail"><?=$func->format_money($getprice['gia'])?></span>
<?php }?>

	