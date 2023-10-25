<?php
include "ajax_config.php";
$productID = $_POST['productID'] ?? 0;
if (!$productID) {
    echo json_encode([
        "success" => false,
    ]);
    die;
}

// list and firt kt
$allKT = $d->rawQuery("SELECT kt.id AS id, kt.length AS LENGTH, kt.width AS width
FROM table_product_kich_thuocs AS kt
WHERE kt.product_id = ?", array($productID));
$firstKT = !empty($allKT) ? $allKT[2] : null;
if (!$firstKT) {
    echo json_encode([
        "success" => false,
    ]);
    die;
}
// list chat lieu with kich thuoc
$allCL = $d->rawQuery("SELECT s1.id AS id,
s1.cl_id AS cl_id,
s1.ki_id AS ki_id,
s1.total_count_decal AS total_count_decal,
s1.price_nl_m2 AS price_nl_m2,
s1.price_nl AS price_nl,
s2.name AS chat_lieu_name
FROM table_product_kich_thuoc_chat_lieus AS s1, table_product_chat_lieus AS s2
WHERE s1.cl_id = s2.id  AND s1.kt_id = ?", array($firstKT['id']));

$firstCL = !empty($allCL) ? $allCL[0] : null;

if (!$firstCL) {
    echo json_encode([
        "success" => false,
    ]);
    die;
}

$data = [
    "success" => true,
    "message" => "Get success",
    "allKT" => $allKT,
    "firstKT" => $firstKT,
    "allCL" => $allCL,
    "firstCL" => $firstCL,
];
echo json_encode($data);
die;
