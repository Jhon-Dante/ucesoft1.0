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
        //--- seccion para educacion inicial
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '1',
            'status' => 1
        ]);
        //--- secciones par 1er grado
        DB::table('secciones')->insert([
            'seccion' => 'A',
            'id_curso' => '2',
            'status' => 1
        ]);

        DB::table('secciones')->insert([
            'seccion' => 'B',
            'id_curso' => '2',
            'status' => 1
        ]);
        //--- secciones para 2do grado
        DB::table('secciones')->insert([
            'seccion' => 'A',
            'id_curso' => '3',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'B',
            'id_curso' => '3',
            'status' => 1
        ]);
        //--- secciones para 3er grado
        DB::table('secciones')->insert([
            'seccion' => 'A',
            'id_curso' => '4',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'B',
            'id_curso' => '4',
            'status' => 1
        ]);
        //--- secciones para 4to grado
        DB::table('secciones')->insert([
            'seccion' => 'A',
            'id_curso' => '5',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'B',
            'id_curso' => '5',
            'status' => 1
        ]);
        //--- secciones para 5to grado
        DB::table('secciones')->insert([
            'seccion' => 'A',
            'id_curso' => '6',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'B',
            'id_curso' => '6',
            'status' => 1
        ]);
        //--- secciones para 6to grado
        DB::table('secciones')->insert([
            'seccion' => 'A',
            'id_curso' => '7',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'B',
            'id_curso' => '7',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '8',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '9',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '10',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '11',
            'status' => 1
        ]);
        DB::table('secciones')->insert([
            'seccion' => 'U',
            'id_curso' => '12',
            'status' => 1
        ]);
    }
}
