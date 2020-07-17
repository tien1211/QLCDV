<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tour', function (Blueprint $table) {
            $table->increments('tour_id');
            $table->unsignedInteger('lt_id');
            $table->date('tour_handk');
            $table->date('tour_ngaybd');
            $table->date('tour_ngaykt');
            $table->double('tour_chiphi', 15, 8);
            $table->integer('tour_soluong');
            $table->unsignedInteger('gd_id');
            $table->string('tour_daily');
            $table->tinyInteger('tour_trangthai')->comment('1 la hien thi 0 la an thong tin');
            $table->timestamps();
            $table->foreign('lt_id')->references('lt_id')->on('LichTrinh')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('gd_id')->references('gd_id')->on('GiaiDoan')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tour');
    }
}
