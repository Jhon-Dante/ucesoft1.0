<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalGuiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_guia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_personal')->unsigned();
            $table->integer('id_seccion')->unsigned();
            $table->integer('id_periodo')->unsigned();

            $table->foreign('id_personal')->references('id')->on('datos_basicos_personal')->onDelete('cascade');
            $table->foreign('id_seccion')->references('id')->on('secciones')->onDelete('cascade');
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
        Schema::drop('personal_guia');
    }
}
