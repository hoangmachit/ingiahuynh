<?php
include "ajax_config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$insert = $d->insert('product_kich_thuocs', $data);
if (!$insert) {
    echo json_encode([
        "success" => false,
        "message" => "Thêm kích thước thất bại !",
    ]);
    die;
}
$detail = $d->rawQueryOne("select *from #_product_kich_thuocs where id=? ", array($insert));
echo json_encode([
    "success" => true,
    "message" => "Thêm kích thước thành công !",
    "detail" => $detail,
]);
die;
