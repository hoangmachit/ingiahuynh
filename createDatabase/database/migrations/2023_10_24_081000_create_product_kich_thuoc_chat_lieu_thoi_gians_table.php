<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductKichThuocChatLieuThoiGiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_kich_thuoc_chat_lieu_thoi_gians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ktcl_id')->constrained('product_kich_thuoc_chat_lieus', 'id');
            $table->foreignId('tg_id')->constrained('product_thoi_gians', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_kich_thuoc_chat_lieu_thoi_gians');
    }
}
