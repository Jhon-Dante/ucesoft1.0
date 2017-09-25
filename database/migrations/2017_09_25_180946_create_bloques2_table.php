<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloques2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloques2', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bloque', 20);
            $table->integer('id_dia')->unsigned();
            $table->foreign('id_dia')->references('id')->on('dias')->onDelete('cascade');
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
        Schema::drop('bloques2');
    }
}
