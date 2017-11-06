<?php

use Illuminate\Database\Seeder;

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
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lengua',
            'codigo' => 'LENG-1G',
            'id_curso' => '2',
            'color' => '#FF4848'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-1G',
            'id_curso' => '2',
            'color' => '#FF9797'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CSCSOC-1G',
            'id_curso' => '2',
            'color' => '#FF62B0'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-1G',
            'id_curso' => '2',
            'color' => '#E469FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-1G',
            'id_curso' => '2',
            'color' => '#9669FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Estética',
            'codigo' => 'EST-1G',
            'id_curso' => '2',
            'color' => '#FFBBFF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Vial',
            'codigo' => 'EDUCVIAL-1G',
            'id_curso' => '2',
            'color' => '#9A03FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales y Tecnologías',
            'codigo' => 'CSCNATEC-1G',
            'id_curso' => '2',
            'color' => '#B5FFFC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Permanente',
            'codigo' => 'FORMP-1G',
            'id_curso' => '2',
            'color' => '#23819C'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación y Valores',
            'codigo' => 'EDUCVAL-1G',
            'id_curso' => '2',
            'color' => '#5757FF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lectura y Ortgrafía',
            'codigo' => 'LECTORG-1G',
            'id_curso' => '2',
            'color' => '#01F33E'
        ]);
        //---- ASIGNATURAS DE 2DO GRADO -------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lengua',
            'codigo' => 'LENG-2G',
            'id_curso' => '3',
            'color' => '#FF4848'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-2G',
            'id_curso' => '3',
            'color' => '#FF9797'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CSCSOC-2G',
            'id_curso' => '3',
            'color' => '#FF62B0'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-2G',
            'id_curso' => '3',
            'color' => '#E469FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-2G',
            'id_curso' => '3',
            'color' => '#9669FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Estética',
            'codigo' => 'EST-2G',
            'id_curso' => '3',
            'color' => '#FFBBFF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Vial',
            'codigo' => 'EDUCVIAL-2G',
            'id_curso' => '3',
            'color' => '#9A03FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales y Tecnologías',
            'codigo' => 'CSCNATEC-2G',
            'id_curso' => '3',
            'color' => '#B5FFFC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Permanente',
            'codigo' => 'FORMP-2G',
            'id_curso' => '3',
            'color' => '#23819C'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación y Valores',
            'codigo' => 'EDUCVAL-2G',
            'id_curso' => '3',
            'color' => '#5757FF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lectura y Ortgrafía',
            'codigo' => 'LECTORG-2G',
            'id_curso' => '3',
            'color' => '#01F33E'
        ]);

        //------ ASIGNATURAS DE 3 ER GRADO --------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lengua',
            'codigo' => 'LENG-3G',
            'id_curso' => '4',
            'color' => '#FF4848'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-3G',
            'id_curso' => '4',
            'color' => '#FF9797'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CSCSOC-3G',
            'id_curso' => '4',
            'color' => '#FF62B0'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-3G',
            'id_curso' => '4',
            'color' => '#E469FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-3G',
            'id_curso' => '4',
            'color' => '#9669FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Estética',
            'codigo' => 'EST-3G',
            'id_curso' => '4',
            'color' => '#FFBBFF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Vial',
            'codigo' => 'EDUCVIAL-3G',
            'id_curso' => '4',
            'color' => '#9A03FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales y Tecnologías',
            'codigo' => 'CSCNATEC-3G',
            'id_curso' => '4',
            'color' => '#B5FFFC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Permanente',
            'codigo' => 'FORMP-3G',
            'id_curso' => '4',
            'color' => '#23819C'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación y Valores',
            'codigo' => 'EDUCVAL-3G',
            'id_curso' => '4',
            'color' => '#5757FF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lectura y Ortgrafía',
            'codigo' => 'LECTORG-3G',
            'id_curso' => '4',
            'color' => '#01F33E'
        ]);

        //----- ASIGNATURAS DEL 4TO GRADO----------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lengua',
            'codigo' => 'LENG-4G',
            'id_curso' => '5',
            'color' => '#FF4848'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-4G',
            'id_curso' => '5',
            'color' => '#FF9797'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CSCSOC-4G',
            'id_curso' => '5',
            'color' => '#FF62B0'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-4G',
            'id_curso' => '5',
            'color' => '#E469FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-4G',
            'id_curso' => '5',
            'color' => '#9669FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Estética',
            'codigo' => 'EST-4G',
            'id_curso' => '5',
            'color' => '#FFBBFF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Vial',
            'codigo' => 'EDUCVIAL-4G',
            'id_curso' => '5',
            'color' => '#9A03FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales y Tecnologías',
            'codigo' => 'CSCNATEC-4G',
            'id_curso' => '5',
            'color' => '#B5FFFC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Permanente',
            'codigo' => 'FORMP-4G',
            'id_curso' => '5',
            'color' => '#23819C'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación y Valores',
            'codigo' => 'EDUCVAL-4G',
            'id_curso' => '5',
            'color' => '#5757FF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lectura y Ortgrafía',
            'codigo' => 'LECTORG-4G',
            'id_curso' => '5',
            'color' => '#01F33E'
        ]);
        //--------- ASIGNATURAS DEL 5TO GRADO -----------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lengua',
            'codigo' => 'LENG-5G',
            'id_curso' => '6',
            'color' => '#FF4848'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-5G',
            'id_curso' => '6',
            'color' => '#FF9797'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CSCSOC-5G',
            'id_curso' => '6',
            'color' => '#FF62B0'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-5G',
            'id_curso' => '6',
            'color' => '#E469FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-5G',
            'id_curso' => '6',
            'color' => '#9669FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Estética',
            'codigo' => 'EST-5G',
            'id_curso' => '6',
            'color' => '#FFBBFF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Vial',
            'codigo' => 'EDUCVIAL-5G',
            'id_curso' => '6',
            'color' => '#9A03FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales y Tecnologías',
            'codigo' => 'CSCNATEC-5G',
            'id_curso' => '6',
            'color' => '#B5FFFC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Permanente',
            'codigo' => 'FORMP-5G',
            'id_curso' => '6',
            'color' => '#23819C'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación y Valores',
            'codigo' => 'EDUCVAL-5G',
            'id_curso' => '6',
            'color' => '#5757FF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lectura y Ortgrafía',
            'codigo' => 'LECTORG-5G',
            'id_curso' => '6',
            'color' => '#01F33E'
        ]);
        //------ ASIGNATURAS DEL 6TO GRADO -------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lengua',
            'codigo' => 'LENG-6G',
            'id_curso' => '7',
            'color' => '#FF4848'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-6G',
            'id_curso' => '7',
            'color' => '#FF9797'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Sociales',
            'codigo' => 'CSCSOC-6G',
            'id_curso' => '7',
            'color' => '#FF62B0'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-6G',
            'id_curso' => '7',
            'color' => '#E469FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-6G',
            'id_curso' => '7',
            'color' => '#9669FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Estética',
            'codigo' => 'EST-6G',
            'id_curso' => '7',
            'color' => '#FFBBFF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Vial',
            'codigo' => 'EDUCVIAL-6G',
            'id_curso' => '7',
            'color' => '#9A03FE'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Ciencias Naturales y Tecnologías',
            'codigo' => 'CSCNATEC-6G',
            'id_curso' => '7',
            'color' => '#B5FFFC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Formación Permanente',
            'codigo' => 'FORMP-6G',
            'id_curso' => '7',
            'color' => '#23819C'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación y Valores',
            'codigo' => 'EDUCVAL-6G',
            'id_curso' => '7',
            'color' => '#5757FF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Lectura y Ortgrafía',
            'codigo' => 'LECTORG-6G',
            'id_curso' => '7',
            'color' => '#01F33E'
        ]);

        //------ ASIGNATURAS DE 1ER AÑO----------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-1A',
            'id_curso' => '8',
            'color' => '#1FCB4A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-1A',
            'id_curso' => '8',
            'color' => '#89FC63'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-1A',
            'id_curso' => '8',
            'color' => '#DFE32D'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-1A',
            'id_curso' => '8',
            'color' => '#E0E04E'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Geografía',
            'codigo' => 'GEO-1A',
            'id_curso' => '8',
            'color' => '#DFA800'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia de Venezuela',
            'codigo' => 'HVZLA-1A',
            'id_curso' => '8',
            'color' => '#FFB428'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Artística',
            'codigo' => 'ART-1A',
            'id_curso' => '8',
            'color' => '#FF800D'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Familiar',
            'codigo' => 'EDUCFAM-1A',
            'id_curso' => '8',
            'color' => '#FFBD82'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación para el Trabajo',
            'codigo' => 'EDUCTRAB-1A',
            'id_curso' => '8',
            'color' => '#D1D17A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Arte y Patrimonio',
            'codigo' => 'ARTPAT-1A',
            'id_curso' => '8',
            'color' => '#C27E3A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-1A',
            'id_curso' => '8',
            'color' => '#25A0C5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Memoria, Ciudadanía y Territorio',
            'codigo' => 'MCT-1A',
            'id_curso' => '8',
            'color' => '#FF5353'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-1A',
            'id_curso' => '8',
            'color' => '#B9264F'
        ]);
        //-------- ASIGNATURAS DEL 2DO AÑO---------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-2A',
            'id_curso' => '9',
            'color' => '#1FCB4A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-2A',
            'id_curso' => '9',
            'color' => '#89FC63'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-2A',
            'id_curso' => '9',
            'color' => '#DFE32D'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-2A',
            'id_curso' => '9',
            'color' => '#E0E04E'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación para la Salud',
            'codigo' => 'EDUCS-2A',
            'id_curso' => '9',
            'color' => '#990099'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia de Venezuela',
            'codigo' => 'HVZLA-2A',
            'id_curso' => '9',
            'color' => '#FFB428'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia Universal',
            'codigo' => 'HUNIV-2A',
            'id_curso' => '9',
            'color' => '#74138C'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Artística',
            'codigo' => 'ART-2A',
            'id_curso' => '9',
            'color' => '#FF800D'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación para el Trabajo',
            'codigo' => 'EDUCTRAB-2A',
            'id_curso' => '9',
            'color' => '#D1D17A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Arte y Patrimonio',
            'codigo' => 'ARTPAT-2A',
            'id_curso' => '9',
            'color' => '#C27E3A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-2A',
            'id_curso' => '9',
            'color' => '#25A0C5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-2A',
            'id_curso' => '9',
            'color' => '#B9264F'
        ]);
        //-------- ASIGNATURAS DEL 3ER AÑO---------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-3A',
            'id_curso' => '10',
            'color' => '#1FCB4A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-3A',
            'id_curso' => '10',
            'color' => '#89FC63'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-3A',
            'id_curso' => '10',
            'color' => '#DFE32D'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-3A',
            'id_curso' => '10',
            'color' => '#E0E04E'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Física',
            'codigo' => 'FIS-3A',
            'id_curso' => '10',
            'color' => '#1F88A7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Química',
            'codigo' => 'QUIM-3A',
            'id_curso' => '10',
            'color' => '#74BAAC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia de Venezuela',
            'codigo' => 'HVZLA-3A',
            'id_curso' => '10',
            'color' => '#FFB428'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Geografía',
            'codigo' => 'GEO-3A',
            'id_curso' => '10',
            'color' => '#DFA800'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación para el Trabajo',
            'codigo' => 'EDUCTRAB-3A',
            'id_curso' => '10',
            'color' => '#D1D17A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-3A',
            'id_curso' => '10',
            'color' => '#25A0C5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-3A',
            'id_curso' => '10',
            'color' => '#B9264F'
        ]);
        //-------- ASIGNATURAS DEL 4TO AÑO---------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-4A',
            'id_curso' => '11',
            'color' => '#1FCB4A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-4A',
            'id_curso' => '11',
            'color' => '#89FC63'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-4A',
            'id_curso' => '11',
            'color' => '#DFE32D'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-4A',
            'id_curso' => '11',
            'color' => '#E0E04E'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Física',
            'codigo' => 'FIS-4A',
            'id_curso' => '11',
            'color' => '#1F88A7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Química',
            'codigo' => 'QUIM-4A',
            'id_curso' => '11',
            'color' => '#74BAAC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Historia de Venezuela',
            'codigo' => 'HVZLA-4A',
            'id_curso' => '11',
            'color' => '#FFB428'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Filosofía',
            'codigo' => 'FIL-4A',
            'id_curso' => '11',
            'color' => '#BBBBFF'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Instrucción Premilitar',
            'codigo' => 'IPM-4A',
            'id_curso' => '11',
            'color' => '#36F200'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-4A',
            'id_curso' => '11',
            'color' => '#25A0C5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-4A',
            'id_curso' => '11',
            'color' => '#B9264F'
        ]);
        //-------- ASIGNATURAS DEL 5TO AÑO---------
        DB::table('asignaturas')->insert([

            'asignatura' => 'Castellano',
            'codigo' => 'CAST-5A',
            'id_curso' => '12',
            'color' => '#1FCB4A'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Matemática',
            'codigo' => 'MAT-5A',
            'id_curso' => '12',
            'color' => '#89FC63'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Inglés',
            'codigo' => 'ING-5A',
            'id_curso' => '12',
            'color' => '#DFE32D'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Biología',
            'codigo' => 'BIO-5A',
            'id_curso' => '12',
            'color' => '#E0E04E'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Física',
            'codigo' => 'FIS-5A',
            'id_curso' => '12',
            'color' => '#1F88A7'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Química',
            'codigo' => 'QUIM-5A',
            'id_curso' => '12',
            'color' => '#74BAAC'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Geografía',
            'codigo' => 'GEO-5A',
            'id_curso' => '12',
            'color' => '#DFA800'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Instrucción Premilitar',
            'codigo' => 'IPM-5A',
            'id_curso' => '12',
            'color' => '#36F200'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Educación Física',
            'codigo' => 'EDUFIS-5A',
            'id_curso' => '12',
            'color' => '#25A0C5'
        ]);
        DB::table('asignaturas')->insert([

            'asignatura' => 'Grupo Estable',
            'codigo' => 'GRUPEST-5A',
            'id_curso' => '12',
            'color' => '#B9264F'
        ]);
    }
}
