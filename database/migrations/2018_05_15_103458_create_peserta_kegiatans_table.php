<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_kegiatans', function (Blueprint $table) {
            $table->integer('idUser')->unsigned();
            $table->integer('idKegiatan')->unsigned();
            $table->boolean('isVerified')->default(0);
            $table->boolean('applyAsGuide')->default(0);
            $table->timestamps();
        });
        Schema::table('peserta_kegiatans', function ($table){
            $table->foreign('idUser')->references('id')->on('users') ->onDelete('cascade');
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
        Schema::dropIfExists('peserta_kegiatans');
    }
}
