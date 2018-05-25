<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('leader')->unsigned();
            $table->boolean('needguide');
            $table->integer('lokasikegiatan')->unsigned()->default(0);
            $table->integer('status');
            $table->integer('budget');
            $table->datetime('mulai');
            $table->datetime('selesai');
            $table->timestamps();
        });

        Schema::table('kegiatans', function ($table){
            $table->foreign('leader')->references('id')->on('users') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
}
