<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongdoanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CongDoanVien', function (Blueprint $table) {
            $table->mediumIncrements('cdv_id');
            $table->unsignedInteger('tc_id');
            $table->unsignedInteger('cv_id');
            $table->unsignedInteger('lnv_id');
            $table->unsignedInteger('mht_id');
            $table->string('cdv_ten');
            $table->date('cdv_ngaysinh');
            $table->tinyInteger('cdv_gioitinh')->comment('1 la Nam 0 la Nữ');
            $table->string('cdv_cmnd');
            $table->string('cdv_nguyenquan');
            $table->string('cdv_diachi');
            $table->string('cdv_sdt');
            $table->string('cdv_email');
            $table->string('cdv_dantoc');
            $table->string('cdv_trinhdo');
            $table->string('cdv_tongiao');
            $table->date('cdv_ngayvaocd');
            $table->date('cdv_ngayvaonganh');
            $table->tinyInteger('cdv_trangthai')->comment('1 la hien thi 0 la an thong tin');
            $table->string('cdv_hinhanh');
            $table->timestamps();


            $table->foreign('tc_id')->references('tc_id')->on('ToChuc')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('cv_id')->references('cv_id')->on('ChucVu')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('lnv_id')->references('lnv_id')->on('LoaiNhanVien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('mht_id')->references('mht_id')->on('MucHoTro')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CongDoanVien');
    }
}