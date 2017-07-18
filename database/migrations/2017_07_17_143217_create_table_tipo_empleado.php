<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipoEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_empleado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_personal')->unsigned();
            $table->string('tipo');

            $table->foreign('id_personal')->references('id')->on('datos_basicos_personal')->onDelete('cascade');

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
        Schema::drop('tipo_empleado');
    }
}
