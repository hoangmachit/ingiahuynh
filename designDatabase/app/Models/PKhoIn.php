<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKhoIn extends Model
{
    use HasFactory;
    protected $table = 'p_kho_in';
    protected $fillable = [
        'left',
        'right',
    ];
}
