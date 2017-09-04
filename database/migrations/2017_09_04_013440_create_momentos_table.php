<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMomentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('momentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_datosBasicos')->unsigned();
            $table->text('t1');
            $table->text('t2');
            $table->text('t3');
            $table->integer('id_periodo')->unsigned();
            $table->timestamps();

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
        Schema::drop('momentos');
    }
}
