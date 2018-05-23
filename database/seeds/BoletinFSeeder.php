<?php

use Illuminate\Database\Seeder;

class BoletinFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=67; $i < 80; $i++) { 
	        DB::table('boletin_final')->insert([

	            'id_asignatura' => $i,
	            'promedio' => 13,
	            'informe' => 'Nada',
	            'fecha' => date('Y-M-D'),
	            'id_datosBasicos' => 5,
	            'id_periodo' => 2
	        ]);
    	}
    }
}
