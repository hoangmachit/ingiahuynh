<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePKichThuocChatLieuQuyCachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_kich_thuoc_chat_lieu_quy_cach', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_kt_cl_id')->constrained('p_kich_thuoc_chat_lieu', 'id');
            $table->foreignId('p_quy_cach_id')->constrained('p_quy_cach', 'id');
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
        Schema::dropIfExists('p_kich_thuoc_chat_lieu_quy_cach');
    }
}
