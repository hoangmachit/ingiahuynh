<?php
include "ajax_config.php";
$kichThuocID = $_POST['kichThuocID'] ? (int) $_POST['kichThuocID'] : 0;
$listChatLieu = $d->rawQuery("SELECT s1.id AS id,
s1.cl_id AS cl_id,
s1.ki_id AS ki_id,
s1.total_count_decal AS total_count_decal,
s1.price_nl_m2 AS price_nl_m2,
s1.price_nl AS price_nl,
s2.name AS chat_lieu_name
FROM table_product_kich_thuoc_chat_lieus AS s1, table_product_chat_lieus AS s2
WHERE s1.cl_id = s2.id  AND s1.kt_id = ?", array($kichThuocID));
$chatLieuChoice = $listChatLieu[0];
echo json_encode([
    "success" => true,
    "listChatLieu" => $listChatLieu,
    "chatLieuChoice" => $chatLieuChoice,
]);
die;
