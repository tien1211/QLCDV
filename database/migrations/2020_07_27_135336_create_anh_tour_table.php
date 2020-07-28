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
            $table->unsignedInteger('lt_id');
            $table->string('at_hinhanh');
            $table->tinyInteger('at_trangthai');
            $table->timestamps();
            $table->foreign('lt_id')->references('lt_id')->on('LichTrinh')->onDelete('CASCADE')->onUpdate('CASCADE');
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