<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JudulAlternatifVideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video', function (Blueprint $table) {
            $table->string('judul_alternatif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video', function (Blueprint $table) {
            $table->dropColumn(["judul_alternatif"]);
        });
    }
}
