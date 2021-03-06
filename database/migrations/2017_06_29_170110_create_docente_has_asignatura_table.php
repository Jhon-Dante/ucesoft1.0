<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteHasAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_has_asignatura', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_personal')->unsigned();
            $table->integer('id_asignatura')->unsigned();
            $table->integer('id_seccion')->unsigned();
            $table->integer('id_periodo')->unsigned();

            $table->foreign('id_personal')->references('id')->on('datos_basicos_personal');
            $table->foreign('id_asignatura')->references('id')->on('asignaturas');
            $table->foreign('id_seccion')->references('id')->on('secciones');
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
        Schema::drop('docente_has_asignatura');
    }
}
