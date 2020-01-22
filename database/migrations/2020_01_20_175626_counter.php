<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Counter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_video')->unsigned()->nullable();
            $table->foreign('id_video')->references('id')->on('video')->onDelete('cascade');
            $table->bigInteger('id_genre')->unsigned()->nullable();
            $table->foreign('id_genre')->references('id')->on('genre')->onDelete('cascade');
            $table->bigInteger('id_anime')->unsigned()->nullable();
            $table->foreign('id_anime')->references('id')->on('anime')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('counter');
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
        Schema::dropIfExists('counter');
    }
}
