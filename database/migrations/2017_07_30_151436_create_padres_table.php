<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',60);
            $table->string('apellidos',60);
            $table->string('nacionalidad',1);
            $table->string('cedula');
            $table->integer('id_parentesco')->unsigned();
            
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
        Schema::drop('padres');
    }
}
