<?php
include "ajax_config.php";
$productID = (isset($_GET['productID'])) ? htmlspecialchars($_GET['productID']) : 0;
$alls = $d->rawQuery("SELECT kt.id AS id, kt.length, kt.width, kt.status, kt.created_at, COUNT(ktcl.id) AS total_items
FROM #_product_kich_thuocs AS kt
LEFT JOIN #_product_kich_thuoc_chat_lieus AS ktcl
ON kt.id = ktcl.kt_id
WHERE kt.product_id=?
GROUP BY kt.id, kt.length, kt.width, kt.status, kt.created_at", array($productID));
echo json_encode([
    "success" => true,
    'alls' => $alls,
]);
die;
