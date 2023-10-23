<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMatIn extends Model
{
    use HasFactory;
    protected $table = 'p_mat_in';
    protected $fillable = [
        'type',
    ];
}
