<?php

use App\Models\PCanMang;
use App\Models\PChatLieu;
use App\Models\PKhoIn;
use App\Models\PKichThuoc;
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
    $kichThuoc = PKichThuoc::with(['kichThuocChatLieu'])->orderByDesc('id')->get();
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
});
