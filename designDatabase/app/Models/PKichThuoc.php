<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKichThuoc extends Model
{
    use HasFactory;
    protected $table = 'p_kich_thuoc';
    protected $fillable = ['length', 'width', 'product_id'];

    public function kichThuocChatLieu()
    {
        return $this->hasMany(PKichThuocChatLieu::class, 'p_kich_thuoc_id', 'id');
    }
}
