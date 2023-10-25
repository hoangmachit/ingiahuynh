<?php
include "ajax_config.php";
$productID = (int) (isset($_GET["productID"])) ? htmlspecialchars($_GET["productID"]) : 0;
if (!$productID) {
    $data = [
        "success" => false,
        "message" => "Error",
    ];
    echo json_encode($data);
    die;
}
$listKichThuoc = $d->rawQuery("SELECT kt.id AS id, kt.length AS length, kt.width AS width
FROM table_product_kich_thuocs AS kt
WHERE kt.product_id = ?", array($productID));
$data = [
    "success" => true,
    "message" => "Get success",
    "result" => [
        'listKichThuoc' => $listKichThuoc,
    ],
];
echo json_encode($data);
die;
