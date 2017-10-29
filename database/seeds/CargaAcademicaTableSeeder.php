<?php

use Illuminate\Database\Seeder;

class CargaAcademicaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// carga academica de Basica a 2do grado seccion A 2017-2018
        for ($i=1; $i < 12 ; $i++) { 
            DB::table('personal_has_asignatura')->insert([  
                'id_personal' => 4,
                'id_asignatura' => $i,
                'id_seccion' => 2,
                'id_periodo' => 3
            ]);
        }

    	// carga academica de Media General a 1er año seccion U 2017-2018
        for ($i=71; $i < 75; $i++) { 
            DB::table('personal_has_asignatura')->insert([  
                'id_personal' => 3,
                'id_asignatura' => $i,
                'id_seccion' => 14,
                'id_periodo' => 3
            ]);
        }         
        
        //-----siguiente
        for ($i=67; $i < 71; $i++) { 
            DB::table('personal_has_asignatura')->insert([  
                'id_personal' => 6,
                'id_asignatura' => $i,
                'id_seccion' => 14,
                'id_periodo' => 3
            ]);
        }
            
        
        //--- tercero
        for ($i=76; $i < 80; $i++) { 
            DB::table('personal_has_asignatura')->insert([  
                'id_personal' => 7,
                'id_asignatura' => $i,
                'id_seccion' => 14,
                'id_periodo' => 3
            ]); 
        }

}
