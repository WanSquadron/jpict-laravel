<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePermohonan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_permohonan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('idpermohonan', 100);
            $table->string('fk_kodppd', 10);
            $table->string('fk_kodsekolah', 11);
            $table->integer('fk_idsumberkewangan');
            $table->integer('fk_statusmohon');
            $table->string('keterangan', 255);
            $table->string('tujuanbeli', 255);
            $table->string('justifikasi', 255);
            $table->decimal('jumlahwang', 10,2);
            $table->decimal('bakiwang', 10,2);
            $table->string('pegawaitanggungjawab', 50);
            $table->string('mykadpegawai', 12);
            $table->string('notelpegawai', 11);
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
        Schema::dropIfExists('table_permohonan');
    }
}
