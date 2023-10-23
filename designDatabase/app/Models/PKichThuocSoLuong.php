<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocSoLuong extends Model
{
    use HasFactory;

    protected $table = 'p_kich_thuoc_so_luong';
    protected $fillable = ['p_kich_thuoc_id', 'p_so_luong_id'];
}
