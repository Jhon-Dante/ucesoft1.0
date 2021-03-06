<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateBoletinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_asignatura')->unsigned();
            
            $table->string('lapso');
            $table->integer('inasistencias');
            $table->string('calificacion');
            $table->integer('id_datosBasicos')->unsigned();
            $table->integer('id_periodo')->unsigned();
            $table->timestamps();

            $table->foreign('id_asignatura')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->foreign('id_datosBasicos')->references('id')->on('datos_basicos')->onDelete('cascade');
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
