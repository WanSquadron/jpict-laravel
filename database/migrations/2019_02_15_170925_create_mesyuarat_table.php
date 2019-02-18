<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesyuaratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesyuarat', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idmesyuarat');
            $table->tinyint('sesimesyuarat');
            $table->timestamps('tarikh_mesyuarat');
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
        Schema::dropIfExists('mesyuarat');
    }
}
