<?php
include "ajax_config.php";
$kichThuocID = (isset($_GET['kichThuocID'])) ? htmlspecialchars($_GET['kichThuocID']) : 0;
$allChatLieu = $d->rawQuery("select * from #_product_kich_thuoc_chat_lieus where kt_id = ? ", array($kichThuocID));
$newData     = [];
foreach ($allChatLieu as $key => $cl) {
    $canMang = $d->rawQuery("select * from #_product_kich_thuoc_chat_lieu_can_mangs AS cl_mc, #_product_can_mangs AS cm 
    where cm.id = cl_mc.cm_id AND cl_mc.ktcl_id=?", array($cl['id']));
    $matIn = $d->rawQuery("select * from #_product_kich_thuoc_chat_lieu_mat_ins AS cl_mc, #_product_mat_ins AS mi 
    where mi.id = cl_mc.mi_id AND cl_mc.ktcl_id=?", array($cl['id']));
    $quyCach = $d->rawQuery("select * from #_product_kich_thuoc_chat_lieu_quy_cachs AS cl_mc, #_product_quy_cachs AS qc 
    where qc.id = cl_mc.qc_id AND cl_mc.ktcl_id=?", array($cl['id']));
    $soLuong = $d->rawQuery("select * from #_product_kich_thuoc_chat_lieu_soluongs AS cl_mc, #_product_so_luongs AS sl 
    where sl.id = cl_mc.sl_id AND cl_mc.ktcl_id=?", array($cl['id']));
    $thoiGian = $d->rawQuery("select * from #_product_kich_thuoc_chat_lieu_thoi_gians AS cl_mc, #_product_thoi_gians AS tg 
    where tg.id = cl_mc.tg_id AND cl_mc.ktcl_id=?", array($cl['id']));
    $chatLieu = $d->rawQueryOne("select * from #_product_chat_lieus where id=? limit 1", array($cl['cl_id']));
    $khoIn = $d->rawQueryOne("select * from #_product_kho_ins where id=? limit 1", array($cl['ki_id']));
    $cl['canMang']      = $canMang;
    $cl['matIn']        = $matIn;
    $cl['quyCach']      = $quyCach;
    $cl['soLuong']      = $soLuong;
    $cl['thoiGian']     = $thoiGian;
    $cl['chatLieu']     = $chatLieu;
    $cl['khoIn']     = $khoIn;
    $allChatLieu[$key]  = $cl;
}
echo json_encode([
    "success" => true,
    'allChatLieu' => $allChatLieu,
]);
die;
