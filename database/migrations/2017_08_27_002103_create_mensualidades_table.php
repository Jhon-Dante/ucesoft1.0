<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensualidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Enero');
            $table->string('Febrero');
            $table->string('Marzo');
            $table->string('Abril');
            $table->string('Mayo');
            $table->string('Junio');
            $table->string('Julio');
            $table->string('Agosto');
            $table->string('Septiembre');
            $table->string('Octubre');
            $table->string('Noviembre');
            $table->string('Diciembre');
            $table->integer('id_datosBasicos')->unsigned();
            $table->integer('id_periodo')->unsigned();


            $table->foreign('id_datosBasicos')->references('id')->on('datos_basicos')->onDelete('cascade');
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('cascade');

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
        Schema::drop('mensualidades');
    }
}
