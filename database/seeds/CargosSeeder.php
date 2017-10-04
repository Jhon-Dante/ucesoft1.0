<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([

            'cargo' => 'Administrador(a)'
        ]);
        DB::table('cargos')->insert([
            'cargo' => 'Secretaria(o)'
        ]);
        DB::table('cargos')->insert([
            'cargo' => 'Docente Media General'
        ]);
        DB::table('cargos')->insert([
            'cargo' => 'Docente Básica'
        ]);
        DB::table('cargos')->insert([
            'cargo' => 'Docente Preescolar'
        ]);
    }
}
