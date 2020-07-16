<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DonVi', function (Blueprint $table) {
            $table->increments('dv_id');
            $table->string('dv_ten');
            $table->tinyInteger('dv_trangthai')->comment('1 la hien thi 0 la an thong tin');
            $table->text('dv_mota');
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
        Schema::dropIfExists('DonVi');
    }
}
