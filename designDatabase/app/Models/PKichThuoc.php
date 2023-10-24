<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuoc extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc';
    protected $fillable = ['length', 'width', 'product_id'];

    public function kichThuocChatLieu()
    {
        return $this->hasMany(PKichThuocChatLieu::class, 'p_kich_thuoc_id', 'id');
    }
    public function khoIn()
    {
        return $this->belongsToMany(PKhoIn::class, 'p_kich_thuoc_kho_in', 'p_kich_thuoc_id', 'p_kho_in_id');
    }
    public function matIn()
    {
        return $this->belongsToMany(PMatIn::class, 'p_kich_thuoc_mat_in', 'p_kich_thuoc_id', 'p_mat_in_id');
    }
    public function soLuong()
    {
        return $this->belongsToMany(PSoLuong::class, 'p_kich_thuoc_so_luong', 'p_kich_thuoc_id', 'p_so_luong_id');
    }
    public function quyCach()
    {
        return $this->belongsToMany(PQuyCach::class, 'p_kich_thuoc_quy_cach', 'p_kich_thuoc_id', 'p_quy_cach_id');
    }

    public function thoiGian()
    {
        return $this->belongsToMany(PThoiGian::class, 'p_kich_thuoc_thoi_gian', 'p_kich_thuoc_id', 'p_thoi_gian_id');
    }

    public function canMang()
    {
        return $this->belongsToMany(PCanMang::class, 'p_kich_thuoc_can_mang', 'p_kich_thuoc_id', 'p_can_mang_id');
    }
}
