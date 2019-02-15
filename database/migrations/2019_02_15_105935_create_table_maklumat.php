<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMaklumat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_maklumat', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idmaklumat');
            $table->string('fk_kodppd', 10);
            $table->string('kodsekolah', 10);
            $table->string('namasekolah', 255);
            $table->string('poskod', 5);
            $table->string('bandar', 50);
            $table->string('notelefon', 15)->nullable();
            $table->string('nofaks', 15)->nullable();
            $table->string('emel', 60)->nullable();
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
        Schema::dropIfExists('table_maklumat');
    }
}
