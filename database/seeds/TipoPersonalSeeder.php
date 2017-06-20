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
    }}
