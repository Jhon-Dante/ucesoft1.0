<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarios2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bloque')->unsigned();
            $table->integer('id_aula')->unsigned();
            $table->integer('id_asignatura')->unsigned();
            $table->integer('id_seccion')->unsigned();
            $table->integer('id_periodo')->unsigned();
            
            $table->foreign('id_bloque')    ->references('id')->on('bloques2')       ->onDelete('cascade');
            $table->foreign('id_aula')      ->references('id')->on('aulas')         ->onDelete('cascade');
            $table->foreign('id_asignatura')->references('id')->on('asignaturas')   ->onDelete('cascade');
            $table->foreign('id_seccion')   ->references('id')->on('secciones')     ->onDelete('cascade');
            $table->foreign('id_periodo')   ->references('id')->on('periodos')      ->onDelete('cascade');
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
        Schema::drop('horarios2');
    }
}
