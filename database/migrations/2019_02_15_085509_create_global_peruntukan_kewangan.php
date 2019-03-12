<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobalPeruntukanKewangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_peruntukan_kewangan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idsumberkewangan');
            $table->string('nama_sumberkewangan', 255);
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
        Schema::dropIfExists('global_peruntukan_kewangan');
    }
}
