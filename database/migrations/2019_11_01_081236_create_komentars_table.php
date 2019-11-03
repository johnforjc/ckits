<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->increments('id_komentar');
            $table->integer('id')->unsigned();
            $table->integer('id_tempat_kos')->unsigned();
            $table->string('isi_komentar');
            $table->integer('rating')->unsigned;
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tempat_kos')->references('id_tempat_kos')->on('tempat_kos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
