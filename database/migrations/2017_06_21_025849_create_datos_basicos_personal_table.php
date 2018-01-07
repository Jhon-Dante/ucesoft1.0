<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosBasicosPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_basicos_personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nacionalidad');
            $table->integer('cedula')->uniqued();
            $table->date('fecha_nacimiento');
            $table->date('fecha_ingreso');
            $table->integer('edad');
            $table->enum('edo_civil',['Soltero(a)','Casado(a)','Concuvino(a)','Viudo(a)']);
            $table->text('direccion');
            $table->string('genero');
            $table->string('codigo_hab');
            $table->string('telf_hab');
            $table->string('codigo_cel');
            $table->string('celular');
            $table->string('correo');
            $table->string('status');
            $table->integer('id_cargo')->unsigned();

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
        Schema::drop('datos_basicos_personal');
    }
}
