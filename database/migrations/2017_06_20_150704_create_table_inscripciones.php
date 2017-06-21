<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInscripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_periodo')->unsigned();
            $table->integer('id_seccion')->unsigned();
            $table->string('status');
            $table->integer('id_datos')->unsigned();


            $table->foreign('id_periodo')->references('id')->on('periodos');
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
        Schema::drop('inscripcion');
    }
}
