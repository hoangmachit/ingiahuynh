<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PThoiGian extends Model
{
    use HasFactory;
    protected $table = 'p_thoi_gian';
    protected $fillable = ['name', 'percent'];
}
