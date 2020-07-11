<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuchotroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MucHoTro', function (Blueprint $table) {
            $table->increments('mht_id');
            $table->string('mht_nam');
            $table->tinyInteger('mht_trangthai')->comment('1 la hien thi 0 la an thong tin');
            $table->double('mht_phihotro', 15, 8);
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
        Schema::dropIfExists('MucHoTro');
    }
}
