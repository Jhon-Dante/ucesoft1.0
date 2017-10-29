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
    	//Carlos Adolfo - 1 grado A
    	for ($i=1; $i < 12; $i++) { 
	        DB::table('boletin')->insert([  
	            'id_asignatura' => $i,
	            'lapso' => 1,
	            'inasistencias' => 1,
	            'calificacion' => 'A',
	            'id_datosBasicos' => 1,
	            'id_periodo' => 2
	        ]);
    	}

    	//Freddy Angel - 1er año U
    	for ($i=67; $i < 80; $i++) { 
	        DB::table('boletin')->insert([  
	            'id_asignatura' => $i,
	            'lapso' => 1,
	            'inasistencias' => 1,
	            'calificacion' => 11,
	            'id_datosBasicos' => 4,
	            'id_periodo' => 2
	        ]);
    	}

    	//John Jesús - 1er año u
    	for ($i=67; $i < 80; $i++) { 
	        DB::table('boletin')->insert([ 
	            'id_asignatura' => $i,
	            'lapso' => 1,
	            'inasistencias' => 1,
	            'calificacion' => 12,
	            'id_datosBasicos' => 5,
	            'id_periodo' => 2
	        ]);
    	}
    	//Marti - 1er año U
    	for ($i=67; $i < 80; $i++) { 
	        DB::table('boletin')->insert([  
	            'id_asignatura' => $i,
	            'lapso' => 1,
	            'inasistencias' => 1,
	            'calificacion' => 13,
	            'id_datosBasicos' => 6,
	            'id_periodo' => 2
	        ]);
    	}


    	//Elva - Preescolar U
	        DB::table('calificaciones')->insert([ 	 
	            'nro_reportes' => 1,
	            'juicios' => 'La alumna se porta bien en clase y aprende rápidamente las activididades básicas',
	            'sugerencia' => 'Más dieta y ejercicios',
	            'id_datosBasicos' => 7,
	            'id_periodo' => 2
	        ]);


    }
}
