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
            $table->integer('id_inscripcion')->unsigned();
            $table->integer('id_pago')->unsigned();
            $table->enum('estado',['Cancelado','Sin pagar']);
            $table->integer('forma_pago');
            $table->string('codigo_operacion')->nullable();

            $table->foreign('id_inscripcion')->references('id')->on('inscripcion')->onDelete('cascade');
            $table->foreign('id_pago')->references('id')->on('pagos')->onDelete('cascade');
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
