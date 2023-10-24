<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductKichThuocChatLieuCanMangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_kich_thuoc_chat_lieu_can_mangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ktcl_id')->constrained('product_kich_thuoc_chat_lieus', 'id');
            $table->foreignId('cm_id')->constrained('product_can_mangs', 'id');
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
        Schema::dropIfExists('product_kich_thuoc_chat_lieu_can_mangs');
    }
}
