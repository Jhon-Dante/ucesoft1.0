<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionTable extends Migration
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
            $table->integer('id_datosbasicos')->unsigned();
            $table->string('repite');
            $table->string('pendiente');
            $table->integer('id_periodo')->unsigned();
            $table->integer('id_seccion')->unsigned();
            $table->timestamps();

            $table->foreign('id_datosbasicos')->references('id')->on('datos_basicos')->onDelete('cascade');
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('cascade');
            $table->foreign('id_seccion')->references('id')->on('secciones')->onDelete('cascade');
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
