<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaKegiatanVerifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_kegiatan_verifieds', function (Blueprint $table) {
            $table->integer('userid')->unsigned();
            $table->integer('kgtid')->unsigned();
            $table->timestamps();
        });

        Schema::table('peserta_kegiatan_verifieds', function ($table){
            $table->foreign('userid')->references('id')->on('users') ->onDelete('cascade');
            $table->foreign('kgtid')->references('id')->on('kegiatans') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_kegiatan_verifieds');
    }
}
