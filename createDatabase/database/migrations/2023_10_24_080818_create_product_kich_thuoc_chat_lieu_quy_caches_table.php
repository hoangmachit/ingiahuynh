<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductKichThuocChatLieuQuyCachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_kich_thuoc_chat_lieu_quy_cachs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ktct_id')->constrained('product_kich_thuoc_chat_lieus', 'id');
            $table->foreignId('qc_id')->constrained('product_quy_cachs', 'id');
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
        Schema::dropIfExists('product_kich_thuoc_chat_lieu_quy_cachs');
    }
}
