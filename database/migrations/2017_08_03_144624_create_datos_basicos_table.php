<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosBasicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_basicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nacionalidad');
            $table->string('cedula')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('lugar_nac');
            $table->string('estado');
            $table->date('fecha_nac');
            $table->integer('edad');
            $table->enum('sexo',['M','F']);
            $table->double('peso');
            $table->double('talla');
            $table->text('salud');
            $table->text('direccion');
            $table->integer('id_representante')->unsigned();

            $table->foreign('id_representante')->references('id')->on('representantes')->onDelete('cascade');
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
        Schema::drop('datos_basicos');
    }
}
