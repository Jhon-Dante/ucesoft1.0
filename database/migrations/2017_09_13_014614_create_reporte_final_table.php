<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReporteFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_final', function (Blueprint $table) {
            $table->increments('id');
            $table->string('informe');
            $table->string('cualitativa');
            $table->date('fecha');
            $table->string('dias_habiles');
            $table->string('inasistencias');
            $table->text('sugerencia');
            $table->integer('id_periodo')->unsigned();
            $table->timestamps();

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
        //
    }
}
