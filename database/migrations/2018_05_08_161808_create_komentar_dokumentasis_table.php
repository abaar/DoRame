<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarDokumentasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_dokumentasis', function (Blueprint $table) {
            $table->integer('dokum_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('komentar');
            $table->timestamps();
        });

        Schema::table('komentar_dokumentasis', function ($table){
            $table->foreign('dokum_id')->references('id')->on('dokumentasi_kegiatans') ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_dokumentasis');
    }
}
