<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnhtourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Anh_Tour', function (Blueprint $table) {
            $table->increments('at_id');
            $table->unsignedInteger('tour_id');
            $table->string('at_hinhanh');
            $table->tinyInteger('at_trangthai');
            $table->timestamps();
            $table->foreign('tour_id')->references('tour_id')->on('tour')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Anh_Tour');
    }
}