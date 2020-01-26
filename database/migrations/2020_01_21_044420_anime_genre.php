<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnimeGenre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_genre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_anime')->unsigned()->nullable();
            $table->foreign('id_anime')->references('id')->on('anime')->onDelete('cascade');
            $table->bigInteger('id_genre')->unsigned()->nullable();
            $table->foreign('id_genre')->references('id')->on('genre')->onDelete('cascade');
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
        Schema::dropIfExists('anime_genre');
    }
}
