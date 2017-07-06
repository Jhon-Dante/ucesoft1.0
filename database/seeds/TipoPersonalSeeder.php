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
        \DB::table('tipo_personal')->insert(array(
        	'tipo' => 'Administrativo'
        ));
        \DB::table('tipo_personal')->insert(array(
        	'tipo' => 'Docente'
        ));
        \DB::table('tipo_personal')->insert(array(
        	'tipo' => 'Obrero'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo' => 'Director(a)'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo' => 'Sub-Director(a)'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo' => 'Secretario(a)'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo' => 'Coordinador(a)'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo' => 'Docente'
        ));
        \DB::table('tipo_empleado')->insert(array(
        	'tipo' => 'Obrero'
        ));
    }}
