<?php

use Illuminate\Database\Seeder;

class MesesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        \DB::table('meses')->insert(array(
        	'mes' => 'Enero'
        ));
        \DB::table('meses')->insert(array(
        	'mes' => 'Febrero'
        ));
        \DB::table('meses')->insert(array(
        	'mes' => 'Marzo'
        ));
        \DB::table('meses')->insert(array(
        	'mes' => 'Abril'
        ));
        \DB::table('meses')->insert(array(
        	'mes' => 'Mayo'
        ));
        \DB::table('meses')->insert(array(
        	'mes' => 'Junio'
        ));
        \DB::table('meses')->insert(array(
        	'mes' => 'Julio'
        ));
        \DB::table('meses')->insert(array(
        	'mes' => 'Agosto'
        ));
        \DB::table('meses')->insert(array(
            'mes' => 'Septiembre'
        ));
        \DB::table('meses')->insert(array(
            'mes' => 'Octubre'
        ));
        \DB::table('meses')->insert(array(
            'mes' => 'Noviembre'
        ));
        \DB::table('meses')->insert(array(
            'mes' => 'Diciembre'
        ));
    }
}
