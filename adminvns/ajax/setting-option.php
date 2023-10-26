<?php
include "ajax_config.php";
$allChatLieu = $d->rawQuery("select  *from #_product_chat_lieus order by id desc");
$allKhoIn = $d->rawQuery("select  *from #_product_kho_ins order by id desc");
$allMatIn = $d->rawQuery("select  *from #_product_mat_ins order by id desc");
$allQuyCach = $d->rawQuery("select  *from #_product_quy_cachs order by id desc");
$allSoLuong = $d->rawQuery("select  *from #_product_so_luongs order by id desc");
$allThoiGian = $d->rawQuery("select  *from #_product_thoi_gians order by id desc");
$allCanMang = $d->rawQuery("select  *from #_product_can_mangs order by id desc");
echo json_encode([
    "success" => true,
    "result" => [
        'allChatLieu' => $allChatLieu,
        'allKhoIn' => $allKhoIn,
        'allMatIn' => $allMatIn,
        'allQuyCach' => $allQuyCach,
        'allSoLuong' => $allSoLuong,
        'allThoiGian' => $allThoiGian,
        'allCanMang' => $allCanMang,
    ],
]);
die;
