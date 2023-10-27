<?php
function calculator(array $dataChoice)
{
    global $d;
    $kichThuocId = $dataChoice['kichThuocId'] ?? 0;
    $kichThuocChatLieuId = $dataChoice['kichThuocChatLieuId'] ?? 0;
    $canMangId = $dataChoice['canMangId'] ?? 0;
    $matInId = $dataChoice['matInId'] ?? 0;
    $quyCachId = $dataChoice['quyCachId'] ?? 0;
    $soLuongId = $dataChoice['soLuongId'] ?? 0;
    $thoiGianId = $dataChoice['thoiGianId'] ?? 0;
    if (empty($dataChoice) || !$kichThuocId || !$kichThuocChatLieuId) {
        return 0;
    }
    $detailKT = $d->rawQueryOne("select * from #_product_kich_thuocs where id=?", array($kichThuocId));
    $detailKTCL = $d->rawQueryOne("select * from #_product_kich_thuoc_chat_lieus where id=?", array($kichThuocChatLieuId));
    if (!$detailKT || !$detailKTCL || ((int) $detailKT['id'] != (int) $detailKTCL['kt_id'])) {
        return 0;
    }
    $totalCountDecal = (int) $detailKTCL['total_count_decal'];
    $priceNlM2 = (int) $detailKTCL['price_nl_m2'];
    $priceNl = (int) $detailKTCL['price_nl'];
    $totalPrice = 0;
    $priceChatLieu = round($priceNl / $totalCountDecal, 2);

    $detailMatIn = $d->rawQueryOne("SELECT s2.*
    FROM #_product_kich_thuoc_chat_lieu_mat_ins as s1, #_product_mat_ins as s2
    WHERE s2.id = ? and s1.ktcl_id=? and s1.mi_id = s2.id", array($matInId, $detailKTCL['id']));

    $priceMatIn = 0;
    if ($detailMatIn) {
        $priceMatIn = round($detailMatIn['percent'] / $totalCountDecal, 2);
    }
    $detailCanMang = $d->rawQueryOne("SELECT s2.*
    FROM #_product_kich_thuoc_chat_lieu_can_mangs as s1, #_product_can_mangs as s2
    WHERE s2.id = ? and s1.ktcl_id=? and s1.cm_id = s2.id", array($canMangId, $detailKTCL['id']));

    $priceCanMang = 0;
    if ($detailCanMang) {
        $priceCanMang = round($detailCanMang['percent'] / $totalCountDecal, 2);
    }

    $detailQuyCach = $d->rawQueryOne("SELECT s2.*
    FROM #_product_kich_thuoc_chat_lieu_quy_cachs as s1, #_product_quy_cachs as s2
    WHERE s2.id = ? and s1.ktcl_id=? and s1.qc_id = s2.id", array($quyCachId, $detailKTCL['id']));

    $priceQuyCach = 0;
    if ($detailQuyCach) {
        $priceQuyCach = round($detailQuyCach['point'] / $totalCountDecal, 2);
    }

    $detailSoLuong = $d->rawQueryOne("SELECT s2.*
    FROM #_product_kich_thuoc_chat_lieu_soluongs as s1, #_product_so_luongs as s2
    WHERE s2.id = ? and s1.ktcl_id=? and s1.sl_id = s2.id", array($soLuongId, $detailKTCL['id']));

    $priceSoluong = 0;
    if ($detailSoLuong) {
        $priceSoluong = ($priceMatIn + $priceCanMang + $priceQuyCach + $priceChatLieu) * (int) $detailSoLuong['count'];
    }
    $detailThoiGian = $d->rawQueryOne("SELECT s2.*
    FROM #_product_kich_thuoc_chat_lieu_thoi_gians as s1, #_product_thoi_gians as s2
    WHERE s2.id = ? and s1.ktcl_id=? and s1.tg_id = s2.id", array($thoiGianId, $detailKTCL['id']));

    $priceThoiGian = 0;
    if ($detailThoiGian) {
        $percentThoiGian = $detailThoiGian['percent'] / 100;
        $realPercent = round($percentThoiGian > 0 ? ($percentThoiGian - 1) : (1 - $percentThoiGian), 2);
        if ($percentThoiGian) {
            $priceThoiGian = $priceSoluong * $realPercent;
        }
    }
    return round($priceChatLieu + $priceMatIn + $priceCanMang + $priceQuyCach + $priceSoluong + $priceThoiGian);
}
