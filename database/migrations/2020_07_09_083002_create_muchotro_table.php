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
            $table->string('mht_ten');
            $table->tinyInteger('mht_trangthai');
            $table->float('mht_phihotro',8,2);
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
