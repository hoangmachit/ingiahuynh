<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocThoiGian extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_thoi_gian';
    protected $fillable = ['p_kich_thuoc_id', 'p_thoi_gian_id'];
}
