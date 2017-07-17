<?php

use Illuminate\Database\Seeder;

class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '1'
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '2'
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '3'
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '4'
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '5'
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '6'
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '7'
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '8'
        ]);
    }
}
