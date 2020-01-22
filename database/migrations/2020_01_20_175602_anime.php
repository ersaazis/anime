<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Anime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('judul_alternatif');
            $table->integer('rating')->nullable();
            $table->integer('voter')->nullable();
            $table->string('status');
            $table->integer('total_episode')->nullable();
            $table->string('hari_tayang');
            $table->string('foto');
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
        Schema::dropIfExists('anime');
    }
}
