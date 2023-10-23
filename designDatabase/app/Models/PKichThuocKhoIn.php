<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocKhoIn extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_kho_in';
    protected $fillable = ['p_kich_thuoc_id','p_kho_in_id'];
}
