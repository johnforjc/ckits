<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempatKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempat_kos', function (Blueprint $table) {
            $table->increments('id_tempat_kos');
            $table->integer('id')->unsigned();
            $table->string('nama_tempat_kos');
            $table->string('alamat');
            $table->integer('kamar_tersedia');
            $table->integer('harga');
            $table->boolean('status_promosi');
            $table->string('keterangan_tempat_kos');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempat_kos');
    }
}
