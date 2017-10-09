<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensualidadesPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualidades_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mensualidad')->unsigned();
            $table->integer('id_pago')->unsigned();

            $table->foreign('id_mensualidad')->references('id')->on('mensualidades')->onDelete('cascade');
            $table->foreign('id_pago')->references('id')->on('pagos')->onDelete('cascade');
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
        Schema::drop('mensualidades_pagos');
    }
}
