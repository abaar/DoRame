<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_lokasis', function (Blueprint $table) {
            $table->integer('lokasi_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('komentar');
            $table->timestamps();
        });


         Schema::table('komentar_lokasis', function ($table){
            $table->foreign('lokasi_id')->references('id')->on('lokasis') ->onDelete('cascade');
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
        Schema::dropIfExists('komentar_lokasis');
    }
}
