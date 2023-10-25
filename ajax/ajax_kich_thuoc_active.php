<?php
include "ajax_config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$kichThuocID = $data['kichThuocID'];
$detail = $d->rawQueryOne("select * from #_product_kich_thuocs where id=?", array($kichThuocID));
echo json_encode([
    "success" => true,
    "message" => "Success",
    "detail" => $detail,
]);
die;
