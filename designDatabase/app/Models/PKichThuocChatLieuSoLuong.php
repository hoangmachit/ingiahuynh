<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocChatLieuSoLuong extends Model
{
    use HasFactory;

    protected $table = 'p_kich_thuoc_chat_lieu_so_luong';
    protected $fillable = ['p_kt_cl_id', 'p_so_luong_id'];
}
