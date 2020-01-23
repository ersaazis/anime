<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NamaAlternatifGenre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('genre', function (Blueprint $table) {
            $table->string('nama_alternatif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genre', function (Blueprint $table) {
            $table->dropColumn(["nama_alternatif"]);
        });
    }
}
