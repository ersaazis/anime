<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Video extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('tipe');
            $table->integer('episode');
            $table->string('foto');
            $table->text('deskripsi');
            $table->string('server1');
            $table->string('server2')->nullable();
            $table->string('server3')->nullable();
            $table->string('server4')->nullable();
            $table->integer('jum_report')->nullable();
            $table->bigInteger('id_anime')->unsigned();
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
        Schema::dropIfExists('video');
    }
}
