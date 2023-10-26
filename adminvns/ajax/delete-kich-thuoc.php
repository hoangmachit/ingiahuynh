<?php
include "ajax_config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$ktDeleted = $data['ktDeleted'];
if (!$ktDeleted) {
    echo json_encode([
        "success" => false,
        "message" => "Dữ liệu xóa không tồn tại!",
    ]);
    die;
}
try {
    $kichThuoc = $d->rawQueryOne("select id from #_product_kich_thuocs where id=?", array($ktDeleted));
    if (!$kichThuoc) {
        echo json_encode([
            "success" => false,
            "message" => "Dữ liệu xóa không tồn tại!",
        ]);
        die;
    }
    $kichThuocCL = $d->rawQueryOne("select id from #_product_kich_thuoc_chat_lieus where kt_id=?", array($ktDeleted));
    $ktclID = $kichThuocCL ? $kichThuocCL['id'] : 0;
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_can_mangs where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_mat_ins where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_quy_cachs where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_soluongs where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieu_thoi_gians where ktcl_id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuoc_chat_lieus where id=?", array($ktclID));
    $d->rawQueryOne("delete from #_product_kich_thuocs where id=?", array($ktDeleted));
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
