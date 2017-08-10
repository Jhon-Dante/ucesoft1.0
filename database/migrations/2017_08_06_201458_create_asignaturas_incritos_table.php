<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasIncritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas_inscritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_inscrito')->unsigned();
            $table->integer('id_asignatura')->unsigned();
            $table->string('pend_rep');

            $table->foreign('id_inscrito')->references('id')->on('preinscripcion')->onDelete('cascade');
            $table->foreign('id_asignatura')->references('id')->on('asignaturas')->onDelete('cascade');
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
        Schema::drop('asignaturas_inscritos');
    }
}
