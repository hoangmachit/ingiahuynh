<?php
include "ajax_config.php";
$id = $_POST['id'] ? (int) $_POST['id'] : 0;
$table = $_POST['table'] ? $_POST['table'] : "";
if (!$id || !$table) {
    echo json_encode([
        "success" => false,
        "message" => "Xóa dữ liệu xóa lỗi !",
    ]);
    die;
}
$sql = "delete from #_" . $table . " where id='" . $id . "'";
$delete = $d->rawQuery($sql, array($id));
if (!$delete) {
    echo json_encode([
        "success" => false,
        "message" => "Dữ liệu đã được sử dụng. Không thể xóa !",
    ]);
    die;
}
echo json_encode([
    "success" => true,
    "message" => "Xóa dữ liệu thành công !",
]);
die;
