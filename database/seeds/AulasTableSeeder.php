<?php

use Illuminate\Database\Seeder;

class AulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aulas')->insert([

            'nombre' => '01',
            'status' => 1
        ]);
        DB::table('aulas')->insert([

            'nombre' => '02',
            'status' => 1
        ]);
        DB::table('aulas')->insert([

            'nombre' => '03',
            'status' => 1
        ]);
        DB::table('aulas')->insert([

            'nombre' => 'Lab 01',
            'status' => 1
        ]);
        DB::table('aulas')->insert([

            'nombre' => 'Lab 02',
            'status' => 1
        ]);
        DB::table('aulas')->insert([

            'nombre' => 'Lab 03',
            'status' => 1
        ]);
    }
}
