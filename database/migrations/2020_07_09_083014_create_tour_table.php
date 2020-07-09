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
            $table->date('tour_ngaybd');
            $table->date('tour_ngaykt');
            $table->float('tour_chiphi');
            $table->integer('tour_soluong');
            $table->string('tour_phuongtien');
            $table->string('tour_diadiem');
            $table->integer('tour_trongnam');
            $table->tinyInteger('tour_trangthai');
            $table->timestamps();
            $table->foreign('lt_id')->references('lt_id')->on('LichTrinh')->onDelete('CASCADE')->onUpdate('CASCADE');
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
