<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocQuyCach extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_quy_cach';
    protected $fillable = ['p_kich_thuoc_id', 'p_quy_cach_id'];
}
