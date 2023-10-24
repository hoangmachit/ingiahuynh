<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductKichThuocChatLieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_kich_thuoc_chat_lieus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kt_id')->constrained('product_kich_thuocs', 'id');
            $table->foreignId('cl_id')->constrained('product_chat_lieus', 'id');
            $table->foreignId('ki_id')->constrained('product_kho_ins', 'id');
            $table->integer('total_count_decal')->default(0);
            $table->integer('price_nl_m2')->default(0);
            $table->integer('price_nl')->default(0);
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
        Schema::dropIfExists('product_kich_thuoc_chat_lieus');
    }
}
