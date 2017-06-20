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
        
    }}
