<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePKichThuocKhoInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_kich_thuoc_kho_in', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_kich_thuoc_id')->constrained('p_kich_thuoc', 'id');
            $table->foreignId('p_kho_in_id')->constrained('p_kho_in', 'id');
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
        Schema::dropIfExists('p_kich_thuoc_kho_in');
    }
}
