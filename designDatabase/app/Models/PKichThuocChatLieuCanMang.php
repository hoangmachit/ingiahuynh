<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocChatLieuCanMang extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_chat_lieu_can_mang';
    protected $fillable = ['p_kt_cl_id','p_can_mang_id'];
}
