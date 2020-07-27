<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnhlichtrinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anhlichtrinh', function (Blueprint $table) {
            $table->increments('alt_id');
            $table->unsignedInteger('lt_id');
            $table->unsignedInteger('anh_id');

            $table->foreign('lt_id')->references('lt_id')->on('LichTrinh')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('anh_id')->references('anh_id')->on('Anh')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anhlichtrinh');
    }
}
