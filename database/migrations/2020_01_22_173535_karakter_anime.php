<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KarakterAnime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karakter_anime', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_anime')->unsigned()->nullable();
            $table->foreign('id_anime')->references('id')->on('anime')->onDelete('set null');
            $table->bigInteger('id_karakter')->unsigned()->nullable();
            $table->foreign('id_karakter')->references('id')->on('karakter')->onDelete('set null');
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
        Schema::dropIfExists('karakter_anime');
    }
}
