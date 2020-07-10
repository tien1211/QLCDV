<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTochucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ToChuc', function (Blueprint $table) {
            $table->increments('tc_id');
            $table->string('tc_ten');
            $table->tinyInteger('tc_trangthai');
            $table->string('tc_tructhuoc');
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
        Schema::dropIfExists('ToChuc');
    }
}
