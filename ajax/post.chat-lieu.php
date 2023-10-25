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
$listMatIn = $d->rawQuery("SELECT *
FROM table_product_kich_thuoc_chat_lieu_can_mangs as s1, table_product_can_mangs as s2
WHERE s1.cm_id = s2.id and s1.ktcl_id = ?
", array($kichThuocChatLieuId));

$data = [
    "success" => true,
    "message" => "Get success",
    "result" => [
        "detail" => $detail,
        'kichThuocChatLieuId' => $kichThuocChatLieuId,
        "listMatIn" => $listMatIn,
    ],
];
echo json_encode($data);
die;
