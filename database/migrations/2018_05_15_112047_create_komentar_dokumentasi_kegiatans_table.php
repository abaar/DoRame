<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarDokumentasiKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_dokumentasi_kegiatans', function (Blueprint $table) {
            $table->integer('idDokumentasi')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->string('komentar');
            $table->timestamps();
        });

        Schema::table('komentar_dokumentasi_kegiatans', function ($table){
            $table->foreign('idUser')->references('id')->on('users') ->onDelete('cascade');
            $table->foreign('idDokumentasi')->references('id')->on('dokumentasi_kegiatans') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_dokumentasi_kegiatans');
    }
}
