<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermohonan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan', function (Blueprint $table) {
            $table->increments('id_permohonan');
            $table->string('moh_numbers', 100);
            $table->string('moh_codesek', 10);
            $table->string('moh_sumberp', 2);
            $table->string('moh_ketrngn');
            $table->string('moh_tujuanb');
            $table->string('moh_justfks');
            $table->decimal('moh_hrgaict', 10, 2);
            $table->integer('moh_statbli', 2);
            $table->integer('moh_thnbeli', 4);
            $table->integer('moh_statusm', 3);
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
        Schema::dropIfExists('permohonan');
    }
}
