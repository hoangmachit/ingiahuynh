<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PQuyCach extends Model
{
    use HasFactory;
    protected $table = 'p_quy_cach';
    protected $fillable = ['name'];
}
