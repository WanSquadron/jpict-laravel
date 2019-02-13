<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_dokumen', function (Blueprint $table) {
            $table->increments('id_dokumen');
            $table->integer('code_surat', 2);            
            $table->string('id_permohonan', 20);
            $table->string('filename', 100);
            $table->string('file_desc', 100);
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
        Schema::dropIfExists('upload_dokumen');
    }
}
