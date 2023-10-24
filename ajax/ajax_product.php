<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES."class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);
$idList = (isset($_GET['idList']) && $_GET['idList'] > 0) ? htmlspecialchars($_GET['idList']) : 0;
$idCat = (isset($_GET['idCat']) && $_GET['idCat'] > 0) ? htmlspecialchars($_GET['idCat']) : 0;
$idItem = (isset($_GET['idItem']) && $_GET['idItem'] > 0) ? htmlspecialchars($_GET['idItem']) : 0;
$type = (isset($_GET['type']) && $_GET['type'] != '') ? htmlspecialchars($_GET['type']) : '';

$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p-1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_product.php?perpage=".$pagingAjax->perpage;
$tempLink = "";
$where = "";

$tempLink .= "&type=$type";

if($idCat)
{
	$tempLink .= "&idCat=".$idCat;
	$where .= " and id_cat = ".$idCat;
}
if($idItem)
{
	$tempLink .= "&idItem=".$idItem;
	$where .= " and id_item = ".$idItem;
}
$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select ten$lang as ten, tenkhongdauvi, tenkhongdauen, id, photo, gia, giamoi, giakm, type from #_product where type='$type' $where  and hienthi > 0 order by stt,id desc";
$sqlCache = $sql." limit $start, $pagingAjax->perpage";
$items = $cache->getCache($sqlCache,'result',7200);
/* Count all data */
$countItems = count($cache->getCache($sql,'result',7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php if($countItems) { ?>
	<?= $func->getTemplateProductAll($items,'product-items') ?>
	<div class="pagination-ajax mgt-25"><?=$pagingItems?></div>
<?php } ?>