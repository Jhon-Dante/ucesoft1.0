<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nacionalidad');
            $table->integer('cedula')->uniqued();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('profesion');
            $table->integer('id_parentesco')->unsigned();
            $table->string('vive_estu');
            $table->string('ingreso_apx');
            $table->string('n_familia');
            $table->text('direccion');
            $table->string('email');
            $table->integer('codigo_hab');
            $table->integer('telf_hab');
            
            $table->string('lugar_tra');
            $table->integer('codigo_tra');
            $table->integer('telf_tra');
            
            $table->string('responsable_m');

            $table->integer('codigo_responsable');
            $table->integer('telf_responsable');
            
            $table->integer('codigo_opcional');
            $table->string('telf_opcional');
            $table->string('nombre_opcional');

            $table->integer('codigo_emergencia');
            $table->string('telf_emergencia');
            
            $table->foreign('id_parentesco')->references('id')->on('parentesco')->onDelete('cascade');

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
        Schema::drop('representantes');
    }
}
