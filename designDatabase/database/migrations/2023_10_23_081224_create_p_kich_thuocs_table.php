<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePKichThuocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_kich_thuoc', function (Blueprint $table) {
            $table->id();
            $table->integer('length')->default(0);
            $table->integer('width')->default(0);
            $table->foreignId('product_id')->constrained('product', 'id');
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
        Schema::dropIfExists('p_kich_thuoc');
    }
}
