<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nacio');
            $table->string('cedula');
            $table->text('direccion');
            $table->string('tenencia');
            $table->date('nacimiento');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('edo_civil');
            $table->string('Municipio');
            $table->string('Ciudad');
            $table->string('estado');
            $table->string('pais');
            $table->string('telf_movil');
            $table->string('telf_fijo');
            $table->string('correo');
            $table->string('titulo');
            $table->string('mencion');





            $table->integer('id_tipoPersonal')->unsigned();
            $table->integer('id_cargo')->unsigned();

            $table->foreign('id_tipoPersonal')->references('id')->on('tipo_personal')->onDelete('cascade');
            $table->foreign('id_cargo')->references('id')->on('cargos')->onDelete('cascade');

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
        Schema::drop('personal');
    }
}
