<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PChatLieu extends Model
{
    use HasFactory;
    protected $table = 'p_chat_lieu';
    protected $fillable = ['name'];
}
