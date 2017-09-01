<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([

            'curso' => 'Educación Preescolar'
        ]);
        DB::table('cursos')->insert([

            'curso' => '1er grado'
        ]);
        DB::table('cursos')->insert([

            'curso' => '2do grado'
        ]);
        DB::table('cursos')->insert([

            'curso' => '3er grado'
        ]);
        DB::table('cursos')->insert([

            'curso' => '4to grado'
        ]);
        DB::table('cursos')->insert([

            'curso' => '5to grado'
        ]);
        DB::table('cursos')->insert([

            'curso' => '6to grado'
        ]);
        DB::table('cursos')->insert([

            'curso' => '1er año'
        ]);
        DB::table('cursos')->insert([

            'curso' => '2do año'
        ]);
        DB::table('cursos')->insert([

            'curso' => '3er año'
        ]);
        DB::table('cursos')->insert([

            'curso' => '4to año'
        ]);
        DB::table('cursos')->insert([

            'curso' => '5to año'
        ]);
        
    }
}
