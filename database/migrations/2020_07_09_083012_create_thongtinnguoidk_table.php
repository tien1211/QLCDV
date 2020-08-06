<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongtinnguoidkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ThongTinNguoiDK', function (Blueprint $table) {
            $table->increments('ttndk_id');
            $table->unsignedInteger('dkt_id');
            $table->string('ttndk_ten');
            $table->tinyInteger('ttndk_gt');
            $table->string('ttndk_tuoi');
            $table->tinyInteger('ttndk_cv');
            $table->tinyInteger('ttndk_trangthai')->comment('1 la hien thi 0 la an thong tin');
            $table->timestamps();
            $table->foreign('dkt_id')->references('dkt_id')->on('DK_Tour')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ThongTinNguoiDK');
    }
}
