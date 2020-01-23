<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_karakter')->unsigned()->nullable();
            $table->foreign('id_karakter')->references('id')->on('karakter')->onDelete('cascade');
            $table->bigInteger('id_anime')->unsigned()->nullable();
            $table->foreign('id_anime')->references('id')->on('anime')->onDelete('cascade');
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
        Schema::dropIfExists('vote');
    }
}
