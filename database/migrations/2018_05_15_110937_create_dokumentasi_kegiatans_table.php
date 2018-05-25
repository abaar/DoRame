<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumentasiKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi_kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idKegiatan')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->string('judul');
            $table->text('deskripsi');
            $table->integer('like')->default(0);
            $table->timestamps();
        });

        Schema::table('dokumentasi_kegiatans', function ($table){
            $table->foreign('idKegiatan')->references('id')->on('kegiatans') ->onDelete('cascade');
            $table->foreign('idUser')->references('id')->on('users') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumentasi_kegiatans');
    }
}
