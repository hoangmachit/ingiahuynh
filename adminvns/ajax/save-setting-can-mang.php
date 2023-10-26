<?php
include "ajax_config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$now = (new DateTime())->format('Y-m-d H:i:s');
if ((int) $data['id']) {
    $d->where('id', $data['id']);
    $update = $d->update('product_can_mangs', [
        'name' => $data['name'],
        'percent' => $data['percent'],
        'updated_at' => $now,
    ]);
    if (!$update) {
        echo json_encode([
            "success" => false,
            "message" => "Cập nhật dữ liệu thất bại !",
        ]);
        die;
    }
    echo json_encode([
        "success" => true,
        "message" => "Cập nhật dữ liệu thành công !",
    ]);
    die;
}

$canMangId = $d->insert('product_can_mangs', [
    'name' => $data['name'],
    'percent' => $data['percent'],
    'updated_at' => $now,
    'created_at' => $now,
]);
if (!$canMangId) {
    echo json_encode([
        "success" => false,
        "message" => "Tạo mới dữ liệu thất bại !",
    ]);
    die;
}
echo json_encode([
    "success" => true,
    "message" => "Tạo mới dữ liệu thành công !",
]);
die;
