<?php
include "config.php";
$kichThuocId = (int) $_POST['kichThuocId'];
$kichThuocChatLieuId = (int) $_POST['kichThuocChatLieuId'];
$ktActive = $d->rawQueryOne("select * from #_product_kich_thuocs where id=?", array($kichThuocId));
$ktChatLieuActive = $d->rawQueryOne("select * from #_product_kich_thuoc_chat_lieus where id=? and kt_id=?", array($kichThuocChatLieuId, $kichThuocId));
if (!$ktActive || !$ktChatLieuActive) {
    echo json_encode([
        'success' => false,
    ]);
    die;
}
$allDataForKTCL = [
    'allCanMang' => [],
    'allMatIn' => [],
    'allQuyCach' => [],
    'allSoLuong' => [],
    'allThoiGian' => [],
];
$listCanMang = $d->rawQuery("SELECT s1.id AS id, s1.cm_id AS cm_id, s2.name AS name, s2.percent AS percent
FROM #_product_kich_thuoc_chat_lieu_can_mangs AS s1 , #_product_can_mangs AS s2
WHERE s1.cm_id = s2.id AND s1.ktcl_id = ?", array($ktChatLieuActive['id']));

$listMatIn = $d->rawQuery("SELECT s1.id AS id, s1.mi_id AS mi_id, s2.name AS name, s2.percent AS percent
FROM #_product_kich_thuoc_chat_lieu_mat_ins AS s1 , #_product_mat_ins AS s2
WHERE s1.mi_id = s2.id AND s1.ktcl_id = ?", array($ktChatLieuActive['id']));

$listQuyCach = $d->rawQuery("SELECT s1.id AS id, s1.qc_id AS qc_id, s2.name AS name, s2.point AS point
FROM #_product_kich_thuoc_chat_lieu_quy_cachs AS s1 , #_product_quy_cachs AS s2
WHERE s1.qc_id = s2.id AND s1.ktcl_id = ?", array($ktChatLieuActive['id']));

$listSoLuong = $d->rawQuery("SELECT s1.id AS id, s1.sl_id AS sl_id, s2.name AS name, s2.count AS count
FROM #_product_kich_thuoc_chat_lieu_soluongs AS s1 , #_product_so_luongs AS s2
WHERE s1.sl_id = s2.id AND s1.ktcl_id = ?", array($ktChatLieuActive['id']));

$listThoiGian = $d->rawQuery("SELECT s1.id AS id, s1.tg_id AS tg_id, s2.name AS name, s2.percent AS percent
FROM #_product_kich_thuoc_chat_lieu_thoi_gians AS s1 , #_product_thoi_gians AS s2
WHERE s1.tg_id = s2.id AND s1.ktcl_id = ?", array($ktChatLieuActive['id']));

$allDataForKTCL = [
    'allCanMang' => $listCanMang,
    'allMatIn' => $listMatIn,
    'allQuyCach' => $listQuyCach,
    'allSoLuong' => $listSoLuong,
    'allThoiGian' => $listThoiGian,
];
$dataChoice = [
    "kichThuocId" => $kichThuocId,
    "kichThuocChatLieuId" => $kichThuocChatLieuId,
    "canMangId" => !empty($allDataForKTCL['allCanMang']) ? $allDataForKTCL['allCanMang'][0]['cm_id'] : null,
    "matInId" => !empty($allDataForKTCL['allMatIn']) ? $allDataForKTCL['allMatIn'][0]['mi_id'] : null,
    "quyCachId" => !empty($allDataForKTCL['allQuyCach']) ? $allDataForKTCL['allQuyCach'][0]['qc_id'] : null,
    "soLuongId" => !empty($allDataForKTCL['allSoLuong']) ? $allDataForKTCL['allSoLuong'][0]['sl_id'] : null,
    "thoiGianId" => !empty($allDataForKTCL['allThoiGian']) ? $allDataForKTCL['allThoiGian'][0]['tg_id'] : null,
];
$data = [
    "success" => true,
    "ktActive" => $ktActive,
    'dsKTChatLieu' => $dsKTChatLieu,
    'allDataForKTCL' => $allDataForKTCL,
    'allDataChoice' => $dataChoice,
    'price' => calculator($dataChoice),
];
echo json_encode($data);
die;
