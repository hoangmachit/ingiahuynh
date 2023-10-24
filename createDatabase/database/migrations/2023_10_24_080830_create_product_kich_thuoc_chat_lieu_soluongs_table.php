<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductKichThuocChatLieuSoluongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_kich_thuoc_chat_lieu_soluongs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ktcl_id')->constrained('product_kich_thuoc_chat_lieus', 'id');
            $table->foreignId('sl_id')->constrained('product_so_luongs', 'id');
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
        Schema::dropIfExists('product_kich_thuoc_chat_lieu_soluongs');
    }
}
