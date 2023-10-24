<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocChatLieu extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_chat_lieu';
    protected $fillable = [
        'p_kich_thuoc_id',
        'p_chat_lieu_id',
        'p_kho_in_id',
        'so_luong_so_con_tren_1_decal',
        'gia_nl_m2',
        'gia_nl',
    ];

    public function khoIn()
    {
        return $this->belongsTo(PKhoIn::class, 'p_kho_in_id', 'id');
    }
    public function chatLieu()
    {
        return $this->belongsTo(PChatLieu::class, 'p_chat_lieu_id', 'id');
    }
    public function matIn()
    {
        return $this->belongsToMany(PMatIn::class, 'p_kich_thuoc_chat_lieu_mat_in', 'p_kt_cl_id', 'p_mat_in_id');
    }
    public function soLuong()
    {
        return $this->belongsToMany(PSoLuong::class, 'p_kich_thuoc_chat_lieu_so_luong', 'p_kt_cl_id', 'p_so_luong_id');
    }
    public function quyCach()
    {
        return $this->belongsToMany(PQuyCach::class, 'p_kich_thuoc_chat_lieu_quy_cach', 'p_kt_cl_id', 'p_quy_cach_id');
    }

    public function thoiGian()
    {
        return $this->belongsToMany(PThoiGian::class, 'p_kich_thuoc_chat_lieu_thoi_gian', 'p_kt_cl_id', 'p_thoi_gian_id');
    }

    public function canMang()
    {
        return $this->belongsToMany(PCanMang::class, 'p_kich_thuoc_chat_lieu_can_mang', 'p_kt_cl_id', 'p_can_mang_id');
    }
}
