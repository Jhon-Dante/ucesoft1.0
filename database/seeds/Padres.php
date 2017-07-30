<?php

use Illuminate\Database\Seeder;

class Padres extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('padres')->insert(array(
        	'nombres' => 'Amado',
        	'apellidos' => 'Perez',
        	'nacionalidad' => 'V',
        	'cedula' => '82828282',
            'vive_con' => 'Si',
        	'id_parentesco' => 2,
        	'id_datosBasicos' => 1
        ));
         \DB::table('padres')->insert(array(
        	'nombres' => 'Carmen',
        	'apellidos' => 'Goyanes',
        	'nacionalidad' => 'V',
        	'cedula' => '7854468',
            'vive_con' => 'Si',
        	'id_parentesco' => 1,
        	'id_datosBasicos' => 1
        ));
         \DB::table('padres')->insert(array(
        	'nombres' => 'Hector',
        	'apellidos' => 'de Troya',
        	'nacionalidad' => 'E',
        	'cedula' => '67738383',
            'vive_con' => 'Si',
        	'id_parentesco' => 2,
        	'id_datosBasicos' => 2
        ));
         \DB::table('padres')->insert(array(
        	'nombres' => 'Briseida',
        	'apellidos' => 'de Aquiles',
        	'nacionalidad' => 'E',
        	'cedula' => '6675678',
            'vive_con' => 'Si',
        	'id_parentesco' => 1,
        	'id_datosBasicos' => 2
        ));
         \DB::table('padres')->insert(array(
        	'nombres' => 'Odiseo',
        	'apellidos' => 'de Odisea',
        	'nacionalidad' => 'V',
        	'cedula' => '6729222',
            'vive_con' => 'Si',
        	'id_parentesco' => 2,
        	'id_datosBasicos' => 3
        ));
         \DB::table('padres')->insert(array(
        	'nombres' => 'Iliada',
        	'apellidos' => 'de Homero',
        	'nacionalidad' => 'V',
        	'cedula' => '7564323',
            'vive_con' => 'Si',
        	'id_parentesco' => 1,
        	'id_datosBasicos' => 3
        ));
    }
}
