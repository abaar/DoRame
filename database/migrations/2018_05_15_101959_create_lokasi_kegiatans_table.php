<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasiKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_kegiatans', function (Blueprint $table) {
            $table->integer("idLokasi")->unsigned();
            $table->integer("idKegiatan")->unsigned();
            $table->datetime('mulai');
            $table->datetime('selesai');
        });

        Schema::table('lokasi_kegiatans', function ($table){
            $table->foreign('idLokasi')->references('id')->on('lokasis') ->onDelete('cascade');
            $table->foreign('idKegiatan')->references('id')->on('kegiatans') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasi_kegiatans');
    }
}
