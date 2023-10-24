<?php
include "ajax_config.php";
$productID = (isset($_GET['productID'])) ? htmlspecialchars($_GET['productID']) : 0;
$alls = $d->rawQuery("select * from #_product_kich_thuocs where product_id = ? limit 0,1", array($productID));
echo json_encode([
    "success" => true,
    'alls' => $alls,
]);
