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
            $table->string('ttndk_ten');
            $table->tinyInteger('ttndk_gioitinh');
            $table->string('ttndk_sdt');
            $table->tinyInteger('ttndk_trangthai');
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
        Schema::dropIfExists('ThongTinNguoiDK');
    }
}
