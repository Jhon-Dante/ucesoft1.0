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

            'curso' => '1 ero'
        ]);
        DB::table('cursos')->insert([

            'curso' => '2 do'
        ]);
        DB::table('cursos')->insert([

            'curso' => '3 ero'
        ]);
        DB::table('cursos')->insert([

            'curso' => '4 to'
        ]);
        DB::table('cursos')->insert([

            'curso' => '5 to'
        ]);
        DB::table('cursos')->insert([

            'curso' => '6 to'
        ]);
        DB::table('cursos')->insert([

            'curso' => '7 mo'
        ]);
        DB::table('cursos')->insert([

            'curso' => '8 vo'
        ]);
        DB::table('cursos')->insert([

            'curso' => '9 no'
        ]);
        DB::table('cursos')->insert([

            'curso' => '1 er año'
        ]);
        DB::table('cursos')->insert([

            'curso' => '2 do año'
        ]);
        DB::table('cursos')->insert([

            'curso' => '3 er año'
        ]);
        DB::table('cursos')->insert([

            'curso' => '4 to año'
        ]);
        DB::table('cursos')->insert([

            'curso' => '5 to año'
        ]);
    }
}
