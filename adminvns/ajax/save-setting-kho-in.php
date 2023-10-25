<?php
include "ajax_config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$now = (new DateTime())->format('Y-m-d H:i:s');
if ((int) $data['id']) {
    $d->where('id', $data['id']);
    $update = $d->update('product_kho_ins', [
        'left' => $data['left'],
        'right' => $data['right'],
        'updated_at' => $now,
    ]);
    if (!$update) {
        echo json_encode([
            "success" => false,
            "message" => "Update fail !",
        ]);
        die;
    }
    echo json_encode([
        "success" => true,
        "message" => "Update success !",
    ]);
    die;
}

$khoInId = $d->insert('product_kho_ins', [
    'left' => $data['left'],
    'right' => $data['right'],
    'updated_at' => $now,
    'created_at' => $now,
]);
if (!$khoInId) {
    echo json_encode([
        "success" => false,
        "message" => "Create fail !",
    ]);
    die;
}
echo json_encode([
    "success" => true,
    "message" => "Create success !",
]);
die;
