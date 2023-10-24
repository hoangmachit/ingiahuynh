<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductKichThuocChatLieuMatInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_kich_thuoc_chat_lieu_mat_ins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ktcl_id')->constrained('product_kich_thuoc_chat_lieus', 'id');
            $table->foreignId('mi_id')->constrained('product_mat_ins', 'id');
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
        Schema::dropIfExists('product_kich_thuoc_chat_lieu_mat_ins');
    }
}
