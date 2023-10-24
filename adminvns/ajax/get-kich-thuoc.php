<?php
include "ajax_config.php";
$productID = (isset($_GET['productID'])) ? htmlspecialchars($_GET['productID']) : 0;
$alls = $d->rawQuery("select * from #_product_kich_thuocs where product_id = ? order by id desc", array($productID));
echo json_encode([
    "success" => true,
    'alls' => $alls,
]);
die;
