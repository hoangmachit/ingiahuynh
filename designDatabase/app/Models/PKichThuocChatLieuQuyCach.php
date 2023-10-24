<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocChatLieuQuyCach extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_chat_lieu_quy_cach';
    protected $fillable = ['p_kt_cl_id', 'p_quy_cach_id'];
}
