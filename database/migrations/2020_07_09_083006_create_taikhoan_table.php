<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TaiKhoan', function (Blueprint $table) {
            $table->string('tk_tendangnhap');
            $table->unsignedMediumInteger('cdv_id');
            $table->string('tk_matkhau');
            $table->tinyInteger('tk_quyen')->comment('1 la admin 0 la nguoi dung bt');
            $table->tinyInteger('tk_trangthai')->comment('1 la hien thi 0 la an thong tin');
            $table->timestamps();
            $table->primary('tk_tendangnhap');
            $table->foreign('cdv_id')->references('cdv_id')->on('CongDoanVien')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TaiKhoan');
    }
}
