<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Javier',
            'email' => 'javier@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Administrador(a)',
            //---------------------------------- Estudiante
            'pre/re' => 'Si',
            'list_estu' => 'Si',
            'edit_estu' => 'Si',
            'eli_estu' => 'Si',
            'const_estu' => 'Si',
            'cer_estu' => 'Si',
            'titulob_estu' => 'Si',
            //---------------------------------- Representante
            'list_repre' => 'Si',
            'create_repre' => 'Si',
            'edit_repre' => 'Si',
            //---------------------------------- mensualidades
            'pag_mensu' => 'Si',
            'edit_montos' => 'Si',
            'edit_monto_m' => 'Si',
            //---------------------------------- calificaciones
            'edit_cali_pre' => 'Si',
            'edit_cali_basic' => 'Si',
            'edit_cali_media' => 'Si',
            //---------------------------------- Horarios
            'gen_horario' => 'Si',
            //---------------------------------- personal
            'list_perso' => 'Si',
            'create_perso' => 'Si',
            'edit_perso' => 'Si',
            'act/desac_perso' => 'Si',
            'asig_car_aca' => 'Si',
            'asig_guia' => 'Si',
            'list_guia' => 'Si',
            //---------------------------------- config

                //------------------------------------- usuarios
                'list_user' => 'Si',
                'list_edit' => 'Si',
                //------------------------------------- asignaturas
                'list_asig' => 'Si',
                'create_asig' => 'Si',
                'edit_asig' => 'Si',
                'elim_asig' => 'Si',
                //------------------------------------- auditoria
                'list_auditoria' => 'Si',
                //------------------------------------- aulas
                'list_aula' => 'Si',
                'create_aula' => 'Si',
                'edit_aula' => 'Si',
                'elim_aula' => 'Si',
                //------------------------------------- cargos
                'list_cargo' => 'Si',
                'create_cargo' => 'Si',
                'edit_cargo' => 'Si',
                'elim_cargo' => 'Si',
                //------------------------------------- periodos
                'list_periodo' => 'Si',
                'create_periodo' => 'Si',
                'edit_periodo' => 'Si',
                'elim_periodo' => 'Si',
                'act/desac_periodo' => 'Si',
                //------------------------------------- respaldar BD
                'res_BD' => 'Si',
                //------------------------------------- Secciones
                'list_seccion' => 'Si',
                'create_seccion' => 'Si',
                'edit_seccion' => 'Si',
                'elim_seccion' => 'Si',
                //-------------------------------------


            'status' => 1
        ]);








        
        
        DB::table('users')->insert([
            'name' => 'Jesus',
            'email' => 'jcesarchg9@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Administrador(a)',
            //---------------------------------- Estudiante
            'pre/re' => 'Si',
            'list_estu' => 'Si',
            'edit_estu' => 'Si',
            'eli_estu' => 'Si',
            'const_estu' => 'Si',
            'cer_estu' => 'Si',
            'titulob_estu' => 'Si',
            //---------------------------------- Representante
            'list_repre' => 'Si',
            'create_repre' => 'Si',
            'edit_repre' => 'Si',
            //---------------------------------- mensualidades
            'pag_mensu' => 'Si',
            'edit_montos' => 'Si',
            'edit_monto_m' => 'Si',
            //---------------------------------- calificaciones
            'edit_cali_pre' => 'Si',
            'edit_cali_basic' => 'Si',
            'edit_cali_media' => 'Si',
            //---------------------------------- Horarios
            'gen_horario' => 'Si',
            //---------------------------------- personal
            'list_perso' => 'Si',
            'create_perso' => 'Si',
            'edit_perso' => 'Si',
            'act/desac_perso' => 'Si',
            'asig_car_aca' => 'Si',
            'asig_guia' => 'Si',
            'list_guia' => 'Si',
            //---------------------------------- config

                //------------------------------------- usuarios
                'list_user' => 'Si',
                'list_edit' => 'Si',
                //------------------------------------- asignaturas
                'list_asig' => 'Si',
                'create_asig' => 'Si',
                'edit_asig' => 'Si',
                'elim_asig' => 'Si',
                //------------------------------------- auditoria
                'list_auditoria' => 'Si',
                //------------------------------------- aulas
                'list_aula' => 'Si',
                'create_aula' => 'Si',
                'edit_aula' => 'Si',
                'elim_aula' => 'Si',
                //------------------------------------- cargos
                'list_cargo' => 'Si',
                'create_cargo' => 'Si',
                'edit_cargo' => 'Si',
                'elim_cargo' => 'Si',
                //------------------------------------- periodos
                'list_periodo' => 'Si',
                'create_periodo' => 'Si',
                'edit_periodo' => 'Si',
                'elim_periodo' => 'Si',
                'act/desac_periodo' => 'Si',
                //------------------------------------- respaldar BD
                'res_BD' => 'Si',
                //------------------------------------- Secciones
                'list_seccion' => 'Si',
                'create_seccion' => 'Si',
                'edit_seccion' => 'Si',
                'elim_seccion' => 'Si',
                //-------------------------------------


            'status' => 1
        ]);
    }
}
