<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangkytourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DK_Tour', function (Blueprint $table) {
            $table->increments('dkt_id');
            $table->unsignedMediumInteger('cdv_id');
            $table->unsignedInteger('tour_id');
            $table->integer('dkt_socho');
            $table->timestamps();

            $table->foreign('cdv_id')->references('cdv_id')->on('CongDoanVien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tour_id')->references('tour_id')->on('Tour')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DK_Tour');
    }
}
