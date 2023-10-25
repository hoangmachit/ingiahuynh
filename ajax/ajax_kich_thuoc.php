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
$allKichThuoc = $d->rawQuery("select * from #_product_kich_thuocs where product_id=?", array($productID));
$data = $result = [];

if (!empty($allKichThuoc)) {
    $firstKichThuoc = $allKichThuoc[0];
    $result['allKichThuoc'] = $allKichThuoc;
    $result['firstKichThuoc'] = $firstKichThuoc;
    $allChatLieu = $d->rawQuery("select cl.*,ct_cl.id as kt_cl_id from #_product_kich_thuoc_chat_lieus as ct_cl, #_product_chat_lieus as cl where cl.id = ct_cl.cl_id and kt_id=?", array($firstKichThuoc['id']));
    $result['allChatLieu'] = $allChatLieu;
    $firstChatLieu = $allChatLieu[2];
    $result['firstChatLieu'] = $firstChatLieu;

    $matIn = $d->rawQuery("select mi.* from #_product_kich_thuoc_chat_lieu_mat_ins as ct_mi, #_product_mat_ins as mi where mi.id = ct_mi.mi_id and ktcl_id=?", array($firstChatLieu['kt_cl_id']));
    $result['firstChatLieu']['matIn'] = $matIn;

    $quyCach = $d->rawQuery("select qc.* from #_product_kich_thuoc_chat_lieu_quy_cachs as cl_qc, #_product_quy_cachs as qc where qc.id = cl_qc.qc_id and ktcl_id=?", array($firstChatLieu['kt_cl_id']));
    $result['firstChatLieu']['quyCach'] = $quyCach;

    $soLuong = $d->rawQuery("select sl.* from #_product_kich_thuoc_chat_lieu_soluongs as cl_sl, #_product_so_luongs as sl where sl.id = cl_sl.sl_id and ktcl_id=?", array($firstChatLieu['kt_cl_id']));
    $result['firstChatLieu']['soLuong'] = $soLuong;

    $thoiGian = $d->rawQuery("select tg.* from #_product_kich_thuoc_chat_lieu_thoi_gians as cl_tg, #_product_thoi_gians as tg where tg.id = cl_tg.tg_id and ktcl_id=?", array($firstChatLieu['kt_cl_id']));
    $result['firstChatLieu']['thoiGian'] = $thoiGian;
    
    $canMang = $d->rawQuery("select cm.* from #_product_kich_thuoc_chat_lieu_can_mangs as cl_cm, #_product_can_mangs as cm where cm.id = cl_cm.cm_id and ktcl_id=?", array($firstChatLieu['kt_cl_id']));
    $result['firstChatLieu']['canMang'] = $canMang;
}
$data['success'] = true;
$data['price'] = 123456;
$data['result'] = $result;
echo json_encode($data);
die;
