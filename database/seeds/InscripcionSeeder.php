<?php

use Illuminate\Database\Seeder;

class InscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('inscripcion')->insert(array(
        	'id_datosBasicos' => '1',
        	'repite' => '1',
        	'pendiente' => '2',
        	'id_periodo' => '2',
        	'id_seccion' => '2'
        ));
        \DB::table('inscripcion')->insert(array(
        	'id_datosBasicos' => '1',
        	'repite' => '2',
        	'pendiente' => '3',
        	'id_periodo' => '2',
        	'id_seccion' => '2'
        ));
    }
}
