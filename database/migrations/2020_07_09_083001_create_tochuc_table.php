<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTochucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ToChuc', function (Blueprint $table) {
            $table->increments('tc_id');
            $table->string('tc_ten');
            $table->tinyInteger('tc_trangthai')->comment('1 la hien thi 0 la an thong tin');
            $table->string('tc_tructhuoc');
            $table->string('tc_gioithieu');
            $table->string('tc_nhiemvu');
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
        Schema::dropIfExists('ToChuc');
    }
}
