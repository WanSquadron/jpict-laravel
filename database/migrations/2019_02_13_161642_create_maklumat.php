<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaklumat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklumat', function (Blueprint $table) {
            $table->increments('id_maklumat');
            $table->string('mak_codeppd', 10);
            $table->string('mak_codesek', 10);
            $table->string('mak_namasek');
            $table->string('mak_poscode', 5);
            $table->string('mak_templats', 50);
            $table->string('mak_nophone', 12);
            $table->string('mak_nomfaks', 12);
            $table->string('mak_almtmel', 60);
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
        Schema::dropIfExists('maklumat');
    }
}
