<?php

use Illuminate\Database\Seeder;
use App\asignaturas;
use App\Periodos;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//---- ASIGNATURAS DE 1 GRADO----
        for ($i=2; $i <= 7 ; $i++) {

            DB::table('asignaturas')->insert([
                'asignatura' => 'Lengua',
                'codigo' => 'LENG-1G',
                'id_curso' => $i,
                'n_bloques' => '6',
                'color' => '#FF4848',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Matemática',
                'codigo' => 'MAT-1G',
                'id_curso' => $i,
                'n_bloques' => '6',
                'color' => '#FF9797',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Ciencias Sociales',
                'codigo' => 'CSCSOC-1G',
                'id_curso' => $i,
                'n_bloques' => '2',
                'color' => '#FF62B0',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Educación Física',
                'codigo' => 'EDUFIS-1G',
                'id_curso' => $i,
                'n_bloques' => '2',
                'color' => '#E469FE',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Inglés',
                'codigo' => 'ING-1G',
                'id_curso' => $i,
                'n_bloques' => '2',
                'color' => '#9669FE',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Estética',
                'codigo' => 'EST-1G',
                'id_curso' => $i,
                'n_bloques' => '2',
                'color' => '#FFBBFF',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Educación Vial',
                'codigo' => 'EDUCVIAL-1G',
                'id_curso' => $i,
                'n_bloques' => '2',
                'color' => '#9A03FE',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Ciencias Naturales y Tecnologías',
                'codigo' => 'CSCNATEC-1G',
                'id_curso' => $i,
                'n_bloques' => '2',
                'color' => '#B5FFFC',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Formación Permanente',
                'codigo' => 'FORMP-1G',
                'id_curso' => $i,
                'n_bloques' => '2',
                'color' => '#23819C',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Educación y Valores',
                'codigo' => 'EDUCVAL-1G',
                'id_curso' => $i,
                'n_bloques' => '2',
                'color' => '#5757FF',
                'status' => 1
            ]);
            DB::table('asignaturas')->insert([

                'asignatura' => 'Lectura y Ortgrafía',
                'codigo' => 'LECTORG-1G',
                'id_curso' => $i,
                'n_bloques' => '3',
                'color' => '#01F33E',
                'status' => 1
            ]);
        }
        
        //------ ASIGNATURAS DE 1ER AÑO----------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-1A',
            'id_curso' => '8',
            'n_bloques' => '4',
            'color' => '#1FCB4A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-1A',
            'id_curso' => '8',
            'n_bloques' => '4',
            'color' => '#89FC63',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-1A',
            'id_curso' => '8',
            'n_bloques' => '4',
            'color' => '#DFE32D',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-1A',
            'id_curso' => '8',
            'n_bloques' => '6',
            'color' => '#E0E04E',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Geografía',
            'codigo' => 'GEO-1A',
            'id_curso' => '8',
            'n_bloques' => '3',
            'color' => '#DFA800',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia de Venezuela',
            'codigo' => 'HVZLA-1A',
            'id_curso' => '8',
            'n_bloques' => '3',
            'color' => '#FFB428',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Artística',
            'codigo' => 'ART-1A',
            'id_curso' => '8',
            'n_bloques' => '2',
            'color' => '#FF800D',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Familiar',
            'codigo' => 'EDUCFAM-1A',
            'id_curso' => '8',
            'n_bloques' => '2',
            'color' => '#FFBD82',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación para el Trabajo',
            'codigo' => 'EDUCTRAB-1A',
            'id_curso' => '8',
            'n_bloques' => '12',
            'color' => '#D1D17A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Arte y Patrimonio',
            'codigo' => 'ARTPAT-1A',
            'id_curso' => '8',
            'n_bloques' => '2',
            'color' => '#C27E3A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-1A',
            'id_curso' => '8',
            'n_bloques' => '4',
            'color' => '#25A0C5',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Memoria, Ciudadanía y Territorio',
            'codigo' => 'MCT-1A',
            'id_curso' => '8',
            'n_bloques' => '4',
            'color' => '#FF5353',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-1A',
            'id_curso' => '8',
            'n_bloques' => '4',
            'color' => '#B9264F',
            'status' => 1
        ]);
        //-------- ASIGNATURAS DEL 2DO AÑO---------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-2A',
            'id_curso' => '9',
            'n_bloques' => '4',
            'color' => '#1FCB4A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-2A',
            'id_curso' => '9',
            'n_bloques' => '4',
            'color' => '#89FC63',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-2A',
            'id_curso' => '9',
            'n_bloques' => '3',
            'color' => '#DFE32D',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-2A',
            'id_curso' => '9',
            'n_bloques' => '6',
            'color' => '#E0E04E',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación para la Salud',
            'codigo' => 'EDUCS-2A',
            'id_curso' => '9',
            'n_bloques' => '2',
            'color' => '#990099',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia de Venezuela',
            'codigo' => 'HVZLA-2A',
            'id_curso' => '9',
            'n_bloques' => '2',
            'color' => '#FFB428',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia Universal',
            'codigo' => 'HUNIV-2A',
            'id_curso' => '9',
            'n_bloques' => '4',
            'color' => '#74138C',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Artística',
            'codigo' => 'ART-2A',
            'id_curso' => '9',
            'n_bloques' => '3',
            'color' => '#FF800D',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación para el Trabajo',
            'codigo' => 'EDUCTRAB-2A',
            'id_curso' => '9',
            'n_bloques' => '16',
            'color' => '#D1D17A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Arte y Patrimonio',
            'codigo' => 'ARTPAT-2A',
            'id_curso' => '9',
            'n_bloques' => '2',
            'color' => '#C27E3A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-2A',
            'id_curso' => '9',
            'n_bloques' => '4',
            'color' => '#25A0C5',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-2A',
            'id_curso' => '9',
            'n_bloques' => '3',
            'color' => '#B9264F',
            'status' => 1
        ]);
        //-------- ASIGNATURAS DEL 3ER AÑO---------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-3A',
            'id_curso' => '10',
            'n_bloques' => '4',
            'color' => '#1FCB4A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-3A',
            'id_curso' => '10',
            'n_bloques' => '5',
            'color' => '#89FC63',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-3A',
            'id_curso' => '10',
            'n_bloques' => '3',
            'color' => '#DFE32D',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-3A',
            'id_curso' => '10',
            'n_bloques' => '6',
            'color' => '#E0E04E',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Física',
            'codigo' => 'FIS-3A',
            'id_curso' => '10',
            'n_bloques' => '6',
            'color' => '#1F88A7',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Química',
            'codigo' => 'QUIM-3A',
            'id_curso' => '10',
            'n_bloques' => '6',
            'color' => '#74BAAC',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia de Venezuela',
            'codigo' => 'HVZLA-3A',
            'id_curso' => '10',
            'n_bloques' => '2',
            'color' => '#FFB428',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Geografía',
            'codigo' => 'GEO-3A',
            'id_curso' => '10',
            'n_bloques' => '3',
            'color' => '#DFA800',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación para el Trabajo',
            'codigo' => 'EDUCTRAB-3A',
            'id_curso' => '10',
            'n_bloques' => '16',
            'color' => '#D1D17A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-3A',
            'id_curso' => '10',
            'n_bloques' => '4',
            'color' => '#25A0C5',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-3A',
            'id_curso' => '10',
            'n_bloques' => '3',
            'color' => '#B9264F',
            'status' => 1
        ]);
        //-------- ASIGNATURAS DEL 4TO AÑO---------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-4A',
            'id_curso' => '11',
            'n_bloques' => '4',
            'color' => '#1FCB4A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-4A',
            'id_curso' => '11',
            'n_bloques' => '4',
            'color' => '#89FC63',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-4A',
            'id_curso' => '11',
            'n_bloques' => '3',
            'color' => '#DFE32D',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-4A',
            'id_curso' => '11',
            'n_bloques' => '6',
            'color' => '#E0E04E',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Física',
            'codigo' => 'FIS-4A',
            'id_curso' => '11',
            'n_bloques' => '6',
            'color' => '#1F88A7',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Química',
            'codigo' => 'QUIM-4A',
            'id_curso' => '11',
            'n_bloques' => '6',
            'color' => '#74BAAC',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia de Venezuela',
            'codigo' => 'HVZLA-4A',
            'id_curso' => '11',
            'n_bloques' => '4',
            'color' => '#FFB428',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Filosofía',
            'codigo' => 'FIL-4A',
            'id_curso' => '11',
            'n_bloques' => '3',
            'color' => '#BBBBFF',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Instrucción Premilitar',
            'codigo' => 'IPM-4A',
            'id_curso' => '11',
            'n_bloques' => '2',
            'color' => '#36F200',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-4A',
            'id_curso' => '11',
            'n_bloques' => '2',
            'color' => '#25A0C5',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-4A',
            'id_curso' => '11',
            'n_bloques' => '4',
            'color' => '#B9264F',
            'status' => 1
        ]);
        //-------- ASIGNATURAS DEL 5TO AÑO---------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-5A',
            'id_curso' => '12',
            'n_bloques' => '3',
            'color' => '#1FCB4A',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-5A',
            'id_curso' => '12',
            'n_bloques' => '5',
            'color' => '#89FC63',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-5A',
            'id_curso' => '12',
            'n_bloques' => '3',
            'color' => '#DFE32D',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-5A',
            'id_curso' => '12',
            'n_bloques' => '6',
            'color' => '#E0E04E',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Física',
            'codigo' => 'FIS-5A',
            'id_curso' => '12',
            'n_bloques' => '6',
            'color' => '#1F88A7',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Química',
            'codigo' => 'QUIM-5A',
            'id_curso' => '12',
            'n_bloques' => '6',
            'color' => '#74BAAC',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Geografía',
            'codigo' => 'GEO-5A',
            'id_curso' => '12',
            'n_bloques' => '6',
            'color' => '#DFA800',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Instrucción Premilitar',
            'codigo' => 'IPM-5A',
            'id_curso' => '12',
            'n_bloques' => '2',
            'color' => '#36F200',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-5A',
            'id_curso' => '12',
            'n_bloques' => '2',
            'color' => '#25A0C5',
            'status' => 1
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-5A',
            'id_curso' => '12',
            'n_bloques' => '3',
            'color' => '#B9264F',
            'status' => 1
        ]);

        $asignaturas=Asignaturas::all();
        $periodos=periodos::all();
    }
}
