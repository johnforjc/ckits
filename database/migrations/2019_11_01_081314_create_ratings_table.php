<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id_rating');
            $table->integer('id')->unsigned();
            $table->integer('id_tempat_kos')->unsigned();
            $table->integer('jumlah_rating');
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
        Schema::dropIfExists('ratings');
    }
}
