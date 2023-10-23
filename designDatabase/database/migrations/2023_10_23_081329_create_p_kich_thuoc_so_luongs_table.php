<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePKichThuocSoLuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_kich_thuoc_so_luong', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_kich_thuoc_id')->constrained('p_kich_thuoc', 'id');
            $table->foreignId('p_so_luong_id')->constrained('p_so_luong', 'id');
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
        Schema::dropIfExists('p_kich_thuoc_so_luong');
    }
}
