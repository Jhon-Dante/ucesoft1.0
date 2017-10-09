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
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 12,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 13,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 14,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 15,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 16,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 17,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 18,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 19,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 20,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 21,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 4,
            'id_asignatura' => 22,
            'id_seccion' => 4,
            'id_periodo' => 2
        ]);
    	// carga academica de Media General a 1er año seccion U 2017-2018
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 3,
            'id_asignatura' => 71,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 3,
            'id_asignatura' => 72,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 3,
            'id_asignatura' => 73,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 3,
            'id_asignatura' => 74,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        //-----siguiente
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 6,
            'id_asignatura' => 67,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 6,
            'id_asignatura' => 68,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 6,
            'id_asignatura' => 69,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 6,
            'id_asignatura' => 70,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        //--- tercero
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 7,
            'id_asignatura' => 75,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 7,
            'id_asignatura' => 76,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 7,
            'id_asignatura' => 77,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 7,
            'id_asignatura' => 78,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
        DB::table('personal_has_asignatura')->insert([  
            'id_personal' => 7,
            'id_asignatura' => 79,
            'id_seccion' => 14,
            'id_periodo' => 2
        ]);
    }
}
