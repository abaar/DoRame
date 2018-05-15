<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotoDokumentasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_dokumentasis', function (Blueprint $table) {
            $table->integer('idDokumentasi')->unsigned();;
            $table->binary('foto')->nullable();
            $table->timestamps();
        });

        Schema::table('foto_dokumentasis', function ($table){
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
        Schema::dropIfExists('foto_dokumentasis');
    }
}
