<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoainhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoaiNhanVien', function (Blueprint $table) {
            $table->increments('lnv_id');
            $table->string('lnv_ten');
            $table->tinyInteger('lnv_trangthai')->comment('1 la hien thi 0 la an thong tin');
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
        Schema::dropIfExists('LoaiNhanVien');
    }
}
