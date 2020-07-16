<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiaidoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GiaiDoan', function (Blueprint $table) {
            $table->increments('gd_id');
            $table->string('giai_doan');
            $table->tinyInteger('gd_trangthai')->comment('1 la hien thi 0 la an thong tin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GiaiDoan');
    }
}
