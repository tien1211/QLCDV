<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailytourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DL_Tour', function (Blueprint $table) {
            $table->unsignedInteger('tour_id');
            $table->unsignedInteger('dl_id');
            $table->primary(['tour_id', 'dl_id']);
            $table->foreign('tour_id')->references('tour_id')->on('Tour')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dl_id')->references('dl_id')->on('DaiLy')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('DL_Tour');
    }
}
