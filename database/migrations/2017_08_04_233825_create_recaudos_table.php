<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecaudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recaudos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('part_nac',2);
            $table->string('boleta_v',2);
            $table->string('ci',2);
            $table->string('fotos',2);
            $table->string('ci_repre',2);
            $table->string('foto_repre',2);
            $table->string('cer_promo',2);
            $table->string('cer_calif',2);
            $table->string('solv_a',2);
            $table->string('tim_fis',2);
            $table->string('const_tra',2);
            $table->string('carpeta_m',2);
            $table->integer('id_datosBasicos')->unsigned();

            $table->foreign('id_datosBasicos')->references('id')->on('datos_basicos')->onDelete('cascade');
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
        Schema::drop('recaudos');
    }
}
