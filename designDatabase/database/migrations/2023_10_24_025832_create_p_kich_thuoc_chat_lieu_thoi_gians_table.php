<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePKichThuocChatLieuThoiGiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_kich_thuoc_chat_lieu_thoi_gian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_kt_cl_id')->constrained('p_kich_thuoc_chat_lieu', 'id');
            $table->foreignId('p_thoi_gian_id')->constrained('p_thoi_gian', 'id');
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
        Schema::dropIfExists('p_kich_thuoc_chat_lieu_thoi_gian');
    }
}
