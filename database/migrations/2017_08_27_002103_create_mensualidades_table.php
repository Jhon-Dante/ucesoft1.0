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
            $table->integer('id_mes')->unsigned();
            $table->enum('estado',['Cancelado','Sin pagar']);
            $table->integer('id_datosBasicos')->unsigned();
            $table->integer('id_periodo')->unsigned();

            
            $table->foreign('id_mes')->references('id')->on('meses')->onDelete('cascade');
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
