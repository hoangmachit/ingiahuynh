<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocChatLieuMatIn extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_chat_lieu_mat_in';
    protected $fillable = ['p_kt_cl_id','p_mat_in_id'];
}
