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
$listKichThuoc = $d->rawQuery("select * from #_product_kich_thuocs where product_id=?", array($productID));
$data = [
    "success" => true,
    "message" => "Get success",
    "result" => [
        'listKichThuoc' => $listKichThuoc,
    ],
];
echo json_encode($data);
die;
