<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PSoLuong extends Model
{
    use HasFactory;
    protected $table = 'p_so_luong';
    protected $fillable = ['count'];
}
