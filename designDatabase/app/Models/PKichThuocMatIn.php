<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuocMatIn extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc_mat_in';
    protected $fillable = ['p_kich_thuoc_id','p_mat_in_id'];
}
