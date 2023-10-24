<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocCanMang extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_can_mang';
    protected $fillable = ['p_kich_thuoc_id','p_can_mang_id'];
}
