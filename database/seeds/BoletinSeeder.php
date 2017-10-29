<?php

use Illuminate\Database\Seeder;

class BoletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i < 12; $i++) { 
	        DB::table('boletin')->insert([  
	            'id_asignatura' => $i,
	            'lapso' => 1,
	            'inasistencias' => 1,
	            'calificacion' => A,
	            'id_datosBasicos' => 1,
	            'id_periodo' => 1
	        ]);
    	}



    }
}
