<?php

use App\Models\PCanMang;
use App\Models\PChatLieu;
use App\Models\PKhoIn;
use App\Models\PKichThuoc;
use App\Models\PKichThuocCanMang;
use App\Models\PKichThuocChatLieu;
use App\Models\PKichThuocKhoIn;
use App\Models\PKichThuocMatIn;
use App\Models\PKichThuocQuyCach;
use App\Models\PKichThuocSoLuong;
use App\Models\PKichThuocThoiGian;
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
    $kichThuoc = PKichThuoc::with(['kichThuocChatLieu', 'khoIn', 'matIn', 'soLuong', 'quyCach', 'thoiGian', 'canMang'])->orderByDesc('id')->get();
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
            $PKichThuocId = $data['p_kich_thuoc_id'];
            $pKichThuocMatIn = $data['p_kich_thuoc_mat_in'] ?? [];
            $pKichThuocKhoIn = $data['p_kich_thuoc_kho_in'] ?? [];
            $pKichThuocCanMang = $data['p_kich_thuoc_can_mang'] ?? [];
            $pKichThuocQuyCach = $data['p_kich_thuoc_quy_cach'] ?? [];
            $pKichThuocSoLuong = $data['p_kich_thuoc_so_luong'] ?? [];
            $pKichThuocThoiGian = $data['p_kich_thuoc_thoi_gian'] ?? [];
            $chatLieu = PKichThuocChatLieu::create($data);
            // Mặt In
            foreach ($pKichThuocMatIn as $key => $mi) {
                PKichThuocMatIn::create([
                    'p_kich_thuoc_id' => $PKichThuocId,
                    'p_mat_in_id' => $mi,
                ]);
            }
            // Khổ In
            foreach ($pKichThuocKhoIn as $key => $ki) {
                PKichThuocKhoIn::create([
                    'p_kich_thuoc_id' => $PKichThuocId,
                    'p_kho_in_id' => $ki,
                ]);
            }
            // Cấn Màng
            foreach ($pKichThuocCanMang as $key => $cm) {
                PKichThuocCanMang::create([
                    'p_kich_thuoc_id' => $PKichThuocId,
                    'p_can_mang_id' => $cm,
                ]);
            }
            // Quy Cách
            foreach ($pKichThuocQuyCach as $key => $qc) {
                PKichThuocQuyCach::create([
                    'p_kich_thuoc_id' => $PKichThuocId,
                    'p_quy_cach_id' => $qc,
                ]);
            }
            // Số lượng
            foreach ($pKichThuocSoLuong as $key => $sl) {
                PKichThuocSoLuong::create([
                    'p_kich_thuoc_id' => $PKichThuocId,
                    'p_so_luong_id' => $sl,
                ]);
            }
            // Thời gian
            foreach ($pKichThuocThoiGian as $key => $tg) {
                PKichThuocThoiGian::create([
                    'p_kich_thuoc_id' => $PKichThuocId,
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
