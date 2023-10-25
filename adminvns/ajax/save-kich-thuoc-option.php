<?php
include "ajax_config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$now = (new DateTime())->format('Y-m-d H:i:s');
$dataInsert = [
    'kt_id' => (int) $data['kt_id'],
    'cl_id' => (int) $data['cl_id'],
    'ki_id' => (int) $data['ki_id'],
    'total_count_decal' => (int) $data['total_count_decal'],
    'price_nl_m2' => (int) $data['price_nl_m2'],
    'price_nl' => (int) $data['price_nl'],
    'created_at' => $now,
    'updated_at' => $now,
];
$kichThuocChatLieuId = $d->insert('product_kich_thuoc_chat_lieus', $dataInsert);
if (!$kichThuocChatLieuId) {
    echo json_encode([
        "success" => false,
        "message" => "Thêm option thất bại !",
        "kichThuocChatLieuId" => $kichThuocChatLieuId,
        "dataInsert" => $dataInsert,
    ]);
    die;
}
$idsCanMang = $data['idsCanMang'];
if (!empty($idsCanMang)) {
    foreach ($idsCanMang as $key => $item) {
        $d->insert('product_kich_thuoc_chat_lieu_can_mangs', [
            'ktcl_id' => $kichThuocChatLieuId,
            'cm_id' => $item,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
$idsMatIn = $data['idsMatIn'];
if (!empty($idsMatIn)) {
    foreach ($idsMatIn as $key => $item) {
        $d->insert('product_kich_thuoc_chat_lieu_mat_ins', [
            'ktcl_id' => $kichThuocChatLieuId,
            'mi_id' => $item,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
$idsQuyCach = $data['idsQuyCach'];
if (!empty($idsQuyCach)) {
    foreach ($idsQuyCach as $key => $item) {
        $d->insert('product_kich_thuoc_chat_lieu_quy_cachs', [
            'ktct_id' => $kichThuocChatLieuId,
            'qc_id' => $item,
        ]);
    }
}
$idsThoiGian = $data['idsThoiGian'];
if (!empty($idsThoiGian)) {
    foreach ($idsThoiGian as $key => $item) {
        $d->insert('product_kich_thuoc_chat_lieu_thoi_gians', [
            'ktcl_id' => $kichThuocChatLieuId,
            'tg_id' => $item,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
$idsSoluong = $data['idsSoluong'];
if (!empty($idsSoluong)) {
    foreach ($idsSoluong as $key => $item) {
        $d->insert('product_kich_thuoc_chat_lieu_soluongs', [
            'ktcl_id' => $kichThuocChatLieuId,
            'sl_id' => $item,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }
}
echo json_encode([
    "success" => true,
    "message" => "Thêm option thành công !",
]);
die;
