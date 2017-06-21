<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tipo_personal', function (Blueprint $table) {

        Schema::create('tipo_empleado', function (Blueprint $table) {

            $table->increments('id');
            $table->string('tipo');
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
        Schema::drop('tipo_personal');
    }
}