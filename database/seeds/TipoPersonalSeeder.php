<?php

use Illuminate\Database\Seeder;

class TipoPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        \DB::table('tipo_personal')->insert(array(
        	'tipo' => 'Administrativo'
        ));
        \DB::table('tipo_personal')->insert(array(
        	'tipo' => 'Docente'
        ));
        \DB::table('tipo_personal')->insert(array(
        	'tipo' => 'Obrero'
        ));
        
=======
        \DB::table('tipo_empleado')->insert(array(
        	'tipo_empleado' => 'Director(a)'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo_empleado' => 'Sub-Director(a)'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo_empleado' => 'Secretario(a)'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo_empleado' => 'Coordinador(a)'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo_empleado' => 'Docente'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo_empleado' => 'Obrero'
        ));
>>>>>>> 63593c99c0cb58f5248c71beb415b1d4f66dcd49
    }}
