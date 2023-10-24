<?php

use App\Models\PCanMang;
use App\Models\PChatLieu;
use App\Models\PKhoIn;
use App\Models\PKichThuoc;
use App\Models\PKichThuocChatLieu;
use App\Models\PKichThuocChatLieuCanMang;
use App\Models\PKichThuocChatLieuMatIn;
use App\Models\PKichThuocChatLieuQuyCach;
use App\Models\PKichThuocChatLieuSoLuong;
use App\Models\PKichThuocChatLieuThoiGian;
use App\Models\PMatIn;
use App\Models\PQuyCach;
use App\Models\PSoLuong;
use App\Models\PThoiGian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('configs', function () {
    $camNang = PCanMang::all();
    $chatLieu = PChatLieu::all();
    $khoIn = PKhoIn::all();
    $matIn = PMatIn::all();
    $quyCach = PQuyCach::all();
    $soLuong = PSoLuong::all();
    $thoiGian = PThoiGian::all();
    $kichThuoc = PKichThuoc::with(['kichThuocChatLieu' => function ($q) {
        $q->with('khoIn', 'chatLieu', 'matIn', 'soLuong', 'quyCach', 'thoiGian', 'canMang');
    }])->orderByDesc('id')->get();
    return response()->json([
        'kichThuoc' => $kichThuoc,
        'configs' => [
            'camNang' => $camNang,
            'chatLieu' => $chatLieu,
            'khoIn' => $khoIn,
            'matIn' => $matIn,
            'quyCach' => $quyCach,
            'soLuong' => $soLuong,
            'thoiGian' => $thoiGian,
        ],
    ]);
});

Route::prefix('kich-thuoc')->group(function () {
    Route::post('create', function (Request $request) {
        $data = $request->all();
        $kichThuoc = PKichThuoc::create($data);
        if ($kichThuoc) {
            return response()->json([
                'success' => true,
                'alls' => PKichThuoc::with(['kichThuocChatLieu'])->orderByDesc('id')->get(),
            ]);
        }
        return response()->json([
            'success' => false,
        ]);
    });
    Route::prefix('chat-lieu')->group(function () {
        Route::post('create', function (Request $request) {
            $data = $request->json()->all();
            $pKichThuocMatIn = $data['p_kich_thuoc_mat_in'] ?? [];
            $pKichThuocCanMang = $data['p_kich_thuoc_can_mang'] ?? [];
            $pKichThuocQuyCach = $data['p_kich_thuoc_quy_cach'] ?? [];
            $pKichThuocSoLuong = $data['p_kich_thuoc_so_luong'] ?? [];
            $pKichThuocThoiGian = $data['p_kich_thuoc_thoi_gian'] ?? [];
            $chatLieu = PKichThuocChatLieu::create($data);
            $pKichThuocChatLieuId = $chatLieu->id;
            // Mặt In
            foreach ($pKichThuocMatIn as $key => $mi) {
                PKichThuocChatLieuMatIn::create([
                    'p_kt_cl_id' => $pKichThuocChatLieuId,
                    'p_mat_in_id' => $mi,
                ]);
            }
            // Cấn Màng
            foreach ($pKichThuocCanMang as $key => $cm) {
                PKichThuocChatLieuCanMang::create([
                    'p_kt_cl_id' => $pKichThuocChatLieuId,
                    'p_can_mang_id' => $cm,
                ]);
            }
            // Quy Cách
            foreach ($pKichThuocQuyCach as $key => $qc) {
                PKichThuocChatLieuQuyCach::create([
                    'p_kt_cl_id' => $pKichThuocChatLieuId,
                    'p_quy_cach_id' => $qc,
                ]);
            }
            // Số lượng
            foreach ($pKichThuocSoLuong as $key => $sl) {
                PKichThuocChatLieuSoLuong::create([
                    'p_kt_cl_id' => $pKichThuocChatLieuId,
                    'p_so_luong_id' => $sl,
                ]);
            }
            // Thời gian
            foreach ($pKichThuocThoiGian as $key => $tg) {
                PKichThuocChatLieuThoiGian::create([
                    'p_kt_cl_id' => $pKichThuocChatLieuId,
                    'p_thoi_gian_id' => $tg,
                ]);
            }
            return response()->json([
                'success' => true,
                'chatLieu' => $chatLieu,
            ]);
        });
    });
});

function calculator ($clActive,$canMang,$kichThuoc,$matIn,$quyCach,$soLuong,$thoiGian){
    $price = 0;
    if($clActive){
        $price += $clActive['gia_nl'] / $clActive['so_luong_so_con_tren_1_decal'];
    }
    if($canMang){
        $price += 300 / $clActive['so_luong_so_con_tren_1_decal'];
    }
    if($matIn){
        $price += 1300 / $clActive['so_luong_so_con_tren_1_decal'];
    }
    if($quyCach){
        if($quyCach['id'] == 1){
            $price += 1000 / $clActive['so_luong_so_con_tren_1_decal'];
        }
        if($quyCach['id'] == 2){
            $price += 1500 / $clActive['so_luong_so_con_tren_1_decal'];
        }
    }
    if($soLuong){
        $price = $price * $soLuong['count'];
    }
    return $price;
}

Route::prefix('product')->group(function () {
    Route::get('detail', function () {
        $kichThuoc = PKichThuoc::with(['kichThuocChatLieu' => function ($q) {
            $q->with('khoIn', 'chatLieu', 'matIn', 'soLuong', 'quyCach', 'thoiGian', 'canMang');
        }])->whereProductId(1)->get();
        return response()->json([
            'success' => true,
            'kichThuoc' => $kichThuoc,
        ]);
    });
    Route::post('calculator', function (Request $request) {
        $data = $request->json()->all();
        $dataActive = $data['dataActive'];
        $clActive = $data['clActive'];
        //
        $canMang = $dataActive['can_mang'] ?? null;
        $kichThuoc = $dataActive['kich_thuoc'] ?? null;
        $matIn = $dataActive['mat_in'] ?? null;
        $quyCach = $dataActive['quy_cach'] ?? null;
        $soLuong = $dataActive['so_luong'] ?? null;
        $thoiGian = $dataActive['thoi_gian'] ?? null;
        $price = calculator ($clActive,$canMang,$kichThuoc,$matIn,$quyCach,$soLuong,$thoiGian);
        return response()->json([
            'success' => true,
            'dataActive' => $dataActive,
            'clActive' => $clActive,
            'price' => $price,
        ]);
    });
});
