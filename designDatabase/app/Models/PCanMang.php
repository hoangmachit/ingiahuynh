<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCanMang extends Model
{
    use HasFactory;
    protected $table = 'p_can_mang';
    protected $fillable = ['name','percent'];
}
