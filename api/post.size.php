<?php
include "config.php";
$productId = (int) (isset($_POST["productId"])) ? htmlspecialchars($_POST["productId"]) : 0;
if (!$productId) {
    echo json_encode([
        'success' => false,
    ]);
    die;
}
$dsKichThuoc = $d->rawQuery("SELECT kt.id AS id, kt.length AS length, kt.width AS width
FROM #_product_kich_thuocs AS kt
WHERE kt.product_id = ?", array($productId));

// lấy first kích thước
$ktActive = null;
$dsKTChatLieu = [];
$ktChatLieuActive = null;
$allDataForKTCL = [
    'allCanMang' => [],
    'allMatIn' => [],
    'allQuyCach' => [],
    'allSoLuong' => [],
    'allThoiGian' => [],
];

if (!empty($dsKichThuoc)) {
    $ktActive = $dsKichThuoc[0];
    $dsKTChatLieu = $d->rawQuery("SELECT s1.id AS id,
    s1.cl_id AS cl_id,
    s1.ki_id AS ki_id,
    s1.total_count_decal AS total_count_decal,
    s1.price_nl_m2 AS price_nl_m2,
    s1.price_nl AS price_nl,
    s2.name AS chat_lieu_name
    FROM #_product_kich_thuoc_chat_lieus AS s1, #_product_chat_lieus AS s2
    WHERE s1.cl_id = s2.id  AND s1.kt_id = ?", array($ktActive['id']));
    if (!empty($dsKTChatLieu)) {
        $ktChatLieuActive = $dsKTChatLieu[0];

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
    }
}
$dataChoice = [
    "kichThuocId" => $ktActive ? $ktActive['id'] : null,
    "kichThuocChatLieuId" => $ktChatLieuActive ? $ktChatLieuActive['id'] : null,
    "canMangId" => !empty($allDataForKTCL['allCanMang']) ? $allDataForKTCL['allCanMang'][0]['cm_id'] : null,
    "matInId" => !empty($allDataForKTCL['allMatIn']) ? $allDataForKTCL['allMatIn'][0]['mi_id'] : null,
    "quyCachId" => !empty($allDataForKTCL['allQuyCach']) ? $allDataForKTCL['allQuyCach'][0]['qc_id'] : null,
    "soLuongId" => !empty($allDataForKTCL['allSoLuong']) ? $allDataForKTCL['allSoLuong'][0]['sl_id'] : null,
    "thoiGianId" => !empty($allDataForKTCL['allThoiGian']) ? $allDataForKTCL['allThoiGian'][0]['tg_id'] : null,
];
$data = [
    "success" => true,
    'dsKichThuoc' => $dsKichThuoc,
    'dsKTChatLieu' => $dsKTChatLieu,
    'allDataForKTCL' => $allDataForKTCL,
    'allDataChoice' => $dataChoice,
    'price' => calculator($dataChoice),
];
echo json_encode($data);
die;
