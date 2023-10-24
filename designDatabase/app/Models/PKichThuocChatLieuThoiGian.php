<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocChatLieuThoiGian extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_chat_lieu_thoi_gian';
    protected $fillable = ['p_kt_cl_id', 'p_thoi_gian_id'];
}
