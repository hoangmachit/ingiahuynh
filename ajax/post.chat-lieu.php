<?php
include "ajax_config.php";
$kichThuocChatLieuId = (int) (isset($_POST["kichThuocChatLieuId"])) ? htmlspecialchars($_POST["kichThuocChatLieuId"]) : 0;
$detail = $d->rawQueryOne("select * from table_product_kich_thuoc_chat_lieus where id=? ", array($kichThuocChatLieuId));
if (!$detail) {
    echo json_encode([
        "success" => false,
    ]);
    die;
}
$listCanMang = $d->rawQuery("SELECT s1.id AS id1, s1.cm_id AS cm_id, s2.name AS name, s2.percent AS percent
FROM table_product_kich_thuoc_chat_lieu_can_mangs AS s1 , table_product_can_mangs AS s2
WHERE s1.cm_id = s2.id AND s1.ktcl_id = ?", array($kichThuocChatLieuId));

$listMatIn = $d->rawQuery("SELECT s1.id AS id1, s1.mi_id AS mi_id, s2.name AS name, s2.percent AS percent
FROM table_product_kich_thuoc_chat_lieu_mat_ins AS s1 , table_product_mat_ins AS s2
WHERE s1.mi_id = s2.id AND s1.ktcl_id = ?", array($kichThuocChatLieuId));

$listQuyCach = $d->rawQuery("SELECT s1.id AS id1, s1.qc_id AS qc_id, s2.name AS name, s2.point AS point
FROM table_product_kich_thuoc_chat_lieu_quy_cachs AS s1 , table_product_quy_cachs AS s2
WHERE s1.qc_id = s2.id AND s1.ktcl_id = ?", array($kichThuocChatLieuId));

$listSoLuong = $d->rawQuery("SELECT s1.id AS id1, s1.sl_id AS sl_id, s2.name AS name, s2.count AS count
FROM table_product_kich_thuoc_chat_lieu_soluongs AS s1 , table_product_so_luongs AS s2
WHERE s1.sl_id = s2.id AND s1.ktcl_id = ?", array($kichThuocChatLieuId));

$listThoiGian = $d->rawQuery("SELECT s1.id AS id1, s1.tg_id AS tg_id, s2.name AS name, s2.percent AS percent
FROM table_product_kich_thuoc_chat_lieu_thoi_gians AS s1 , table_product_thoi_gians AS s2
WHERE s1.tg_id = s2.id AND s1.ktcl_id = ?", array($kichThuocChatLieuId));

$data = [
    "success" => true,
    "message" => "Get success",
    "result" => [
        "listCanMang" => $listCanMang,
        "listMatIn" => $listMatIn,
        "listQuyCach" => $listQuyCach,
        "listSoLuong" => $listSoLuong,
        "listThoiGian" => $listThoiGian,
    ],
];
echo json_encode($data);
die;
