<?php
include "ajax_config.php";
$kichThuocID = $_POST['kichThuocID'] ? (int) $_POST['kichThuocID'] : 0;
$listChatLieu = $d->rawQuery("SELECT s1.id as kt_cl_id, s2.name as cl_name, s2.id as cl_id, s1.ki_id as ki_id
FROM table_product_kich_thuoc_chat_lieus as s1, table_product_chat_lieus as s2
WHERE s1.cl_id = s2.id and kt_id=?", array($kichThuocID));
$chatLieuChoice = $listChatLieu[0];
echo json_encode([
    "success" => true,
    "listChatLieu" => $listChatLieu,
    "chatLieuChoice" => $chatLieuChoice,
]);
die;
