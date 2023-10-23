<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocChatLieu extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_chat_lieu';
    protected $fillable = ['p_kich_thuoc_id', 'p_chat_lieu_id', 'so_luong_so_con_tren_1_decal', 'gia_nl_m2', 'gia_nl'];
}
