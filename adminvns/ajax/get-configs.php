<?php
include "ajax_config.php";
$canMang = $d->rawQuery("select * from #_product_can_mangs order by id desc");
$matIn = $d->rawQuery("select * from #_product_mat_ins order by id desc");
$quyCach = $d->rawQuery("select * from #_product_quy_cachs order by id desc");
$soluong = $d->rawQuery("select * from #_product_so_luongs order by id desc");
$thoiGian = $d->rawQuery("select * from #_product_thoi_gians order by id desc");
$khoIn = $d->rawQuery("select * from #_product_kho_ins order by id desc");
$chatLieu = $d->rawQuery("select * from #_product_chat_lieus order by id desc");
echo json_encode([
    "success" => true,
    'alls' => [
        'canMang' => $canMang,
        'matIn' => $matIn,
        'quyCach' => $quyCach,
        'soluong' => $soluong,
        'thoiGian' => $thoiGian,
        'khoIn' => $khoIn,
        'chatLieu' => $chatLieu,
    ]
]);
die;
