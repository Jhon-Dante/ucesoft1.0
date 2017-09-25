<?php

use Illuminate\Database\Seeder;

class Bloques2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//-- bloques2 par horarios de 1ero a 3er grado
        DB::table('bloques2')->insert(['bloque' => '7:00 - 8:00','id_dia' => '1']);
        DB::table('bloques2')->insert(['bloque' => '8:00 - 8:30','id_dia' => '1']);
        DB::table('bloques2')->insert(['bloque' => '8:35 - 9:10','id_dia' => '1']);
        DB::table('bloques2')->insert(['bloque' => '9:10 - 9:50','id_dia' => '1']);
        DB::table('bloques2')->insert(['bloque' => '9:50 - 10:30','id_dia' => '1']);
        DB::table('bloques2')->insert(['bloque' => '10:30 - 11:10','id_dia' => '1']);
        DB::table('bloques2')->insert(['bloque' => '11:10 - 12:00','id_dia' => '1']);
        
    
        DB::table('bloques2')->insert(['bloque' => '7:00 - 7:40','id_dia' => '2']);
        DB::table('bloques2')->insert(['bloque' => '8:00 - 8:30','id_dia' => '2']);
        DB::table('bloques2')->insert(['bloque' => '8:35 - 9:10','id_dia' => '2']);
        DB::table('bloques2')->insert(['bloque' => '9:10 - 9:50','id_dia' => '2']);
        DB::table('bloques2')->insert(['bloque' => '9:50 - 10:30','id_dia' => '2']);
        DB::table('bloques2')->insert(['bloque' => '10:30 - 11:10','id_dia' => '2']);
        DB::table('bloques2')->insert(['bloque' => '11:10 - 12:00','id_dia' => '2']);
        

        DB::table('bloques2')->insert(['bloque' => '7:00 - 7:40','id_dia' => '3']);
        DB::table('bloques2')->insert(['bloque' => '8:00 - 8:30','id_dia' => '3']);
        DB::table('bloques2')->insert(['bloque' => '8:35 - 9:10','id_dia' => '3']);
        DB::table('bloques2')->insert(['bloque' => '9:10 - 9:50','id_dia' => '3']);
        DB::table('bloques2')->insert(['bloque' => '9:50 - 10:30','id_dia' => '3']);
        DB::table('bloques2')->insert(['bloque' => '10:30 - 11:10','id_dia' => '3']);
        DB::table('bloques2')->insert(['bloque' => '11:10 - 12:00','id_dia' => '3']);
        DB::table('bloques2')->insert(['bloque' => '12:00 - 12:20','id_dia' => '3']);
        

        DB::table('bloques2')->insert(['bloque' => '7:00 - 7:40','id_dia' => '4']);
        DB::table('bloques2')->insert(['bloque' => '8:00 - 8:30','id_dia' => '4']);
        DB::table('bloques2')->insert(['bloque' => '8:35 - 9:10','id_dia' => '4']);
        DB::table('bloques2')->insert(['bloque' => '9:10 - 9:50','id_dia' => '4']);
        DB::table('bloques2')->insert(['bloque' => '9:50 - 10:30','id_dia' => '4']);
        DB::table('bloques2')->insert(['bloque' => '10:30 - 11:10','id_dia' => '4']);
        DB::table('bloques2')->insert(['bloque' => '11:10 - 12:00','id_dia' => '4']);
        DB::table('bloques2')->insert(['bloque' => '12:00 - 12:20','id_dia' => '4']);
        


        DB::table('bloques2')->insert(['bloque' => '7:00 - 7:40','id_dia' => '5']);
        DB::table('bloques2')->insert(['bloque' => '8:00 - 8:30','id_dia' => '5']);
        DB::table('bloques2')->insert(['bloque' => '8:35 - 9:10','id_dia' => '5']);
        DB::table('bloques2')->insert(['bloque' => '9:10 - 9:50','id_dia' => '5']);
        DB::table('bloques2')->insert(['bloque' => '9:50 - 10:30','id_dia' => '5']);
        DB::table('bloques2')->insert(['bloque' => '10:30 - 11:10','id_dia' => '5']);
        DB::table('bloques2')->insert(['bloque' => '11:10 - 12:00','id_dia' => '5']);
        DB::table('bloques2')->insert(['bloque' => '12:00 - 12:20','id_dia' => '5']);
        
    }
}
