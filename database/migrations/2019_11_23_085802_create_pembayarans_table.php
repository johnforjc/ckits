<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->integer('id_tempat_kos')->unsigned();
            $table->integer('valid');
            $table->integer('jenis_promosi');
            $table->integer('harga');
            $table->foreign('id_tempat_kos')->references('id_tempat_kos')->on('tempat_kos')->onDelete('cascade');
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
        Schema::dropIfExists('pembayarans');
    }
}
