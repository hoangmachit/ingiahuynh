<?php
include "ajax_config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$ktclID = $data['ktcl_id'] ?? 0;
if (!$ktclID) {
    echo json_encode([
        "success" => false,
        "message" => "Dữ liệu xóa không tồn tại!",
    ]);
    die;
}
try {
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_can_mangs where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_mat_ins where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_quy_cachs where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_soluongs where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_thoi_gians where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieus where id=?", array($ktclID));
    echo json_encode([
        "success" => true,
        "message" => "Xóa dữ liệu thành công!",
    ]);
    die;
} catch (\Throwable $th) {
    echo json_encode([
        "success" => false,
        "message" => "Xóa dữ liệu lỗi!",
    ]);
    die;
}
