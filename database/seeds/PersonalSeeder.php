<?php

use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Carlos Adolfo',
            'apellidos' => 'García Campos',
            'nacionalidad' => 'V',
            'cedula' => '11999543',
            'fecha_nacimiento' => '1980-05-23',
            'edo_civil' => 'Soltero(a)',
            'direccion' => 'Calle Santiago Mariño, casa nro. 34',
            'genero' => '1',
            'codigo_hab' => '0',
            'telf_hab' => '8854854',
            'codigo_cel' => '3',
            'celular' => '4333233',
            'correo' => 'carlosagc90@live.com',
            'id_cargo' => '1',
            'status' => '1'
        ]);
        DB::table('users')->insert([
            'name' => 'Carlos García',
            'email' => 'carlosagc90@live.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Secretario(a)',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);

        //2
        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'María Josefa',
            'apellidos' => 'Palacios',
            'nacionalidad' => 'E',
            'cedula' => '43838459',
            'fecha_nacimiento' => '1990-05-09',
            'edo_civil' => 'Casado(a)',
            'direccion' => 'Calle Antonio José de Sucre, apartamento los ruices, nro. 4, La Victoria.',
            'genero' => '0',
            'codigo_hab' => '0',
            'telf_hab' => '8854854',
            'codigo_cel' => '4',
            'celular' => '4333233',
            'correo' => 'mjosefap@live.com',
            'id_cargo' => '1',
            'status' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'María Palacio',
            'email' => 'mjosefap@live.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Administrador(a)',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);
        //3
         DB::table('datos_basicos_personal')->insert([
            'nombres' => 'James',
            'apellidos' => 'Maslow',
            'nacionalidad' => 'E',
            'cedula' => '59683845',
            'fecha_nacimiento' => '1994-01-21',
            'edo_civil' => 'Viudo(a)',
            'direccion' => 'Calle wutemberg, apartamento The Sky, Whashinton D.C.',
            'genero' => '1',
            'codigo_hab' => '0',
            'telf_hab' => '3242344',
            'codigo_cel' => '3',
            'celular' => '9999898',
            'correo' => 'jamesmOficial@live.com',
            'id_cargo' => '3',
            'status' => '1'
        ]);

         DB::table('users')->insert([
            'name' => 'James',
            'email' => 'jamesmOficial@live.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Media General',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);
         //4
         DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Mario',
            'apellidos' => 'Pistache',
            'nacionalidad' => 'E',
            'cedula' => '396838459',
            'fecha_nacimiento' => '1985-11-07',
            'edo_civil' => 'Concubino(a)',
            'direccion' => 'Calle Soublette, nro. 4, La Victoria.',
            'genero' => '0',
            'codigo_hab' => '1',
            'telf_hab' => '8080090',
            'codigo_cel' => '2',
            'celular' => '4343321',
            'correo' => 'marioelpistache@live.com',
            'id_cargo' => '4',
            'status' => '1'
        ]);

         DB::table('users')->insert([
            'name' => 'Mario',
            'email' => 'marioelpistache@live.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Basica',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);
         //5
        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Alex',
            'apellidos' => 'Campos',
            'nacionalidad' => 'V',
            'cedula' => '96838459',
            'fecha_nacimiento' => '1985-11-07',
            'edo_civil' => 'Concubino(a)',
            'direccion' => 'Calle Soublette, nro. 4, La Victoria.',
            'genero' => '0',
            'codigo_hab' => '1',
            'telf_hab' => '8080090',
            'codigo_cel' => '2',
            'celular' => '4343321',
            'correo' => 'alex@live.com',
            'id_cargo' => '5',
            'status' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Alex',
            'email' => 'alex@live.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Preescolar',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);
        //6
        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'José',
            'apellidos' => 'Ramírez',
            'nacionalidad' => 'V',
            'cedula' => '96838451',
            'fecha_nacimiento' => '1985-11-07',
            'edo_civil' => 'Concubino(a)',
            'direccion' => 'Calle Soublette, nro. 4, La Victoria.',
            'genero' => '0',
            'codigo_hab' => '1',
            'telf_hab' => '8080090',
            'codigo_cel' => '2',
            'celular' => '4343321',
            'correo' => 'joseramirez@live.com',
            'id_cargo' => '3',
            'status' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'José Ramírez',
            'email' => 'joseramirez@live.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Media General',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);

        //7
        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Carmen',
            'apellidos' => 'Prime',
            'nacionalidad' => 'V',
            'cedula' => '96838400',
            'fecha_nacimiento' => '1985-11-07',
            'edo_civil' => 'Concubino(a)',
            'direccion' => 'Calle Soublette, nro. 4, La Victoria.',
            'genero' => '1',
            'codigo_hab' => '1',
            'telf_hab' => '8080090',
            'codigo_cel' => '2',
            'celular' => '4343321',
            'correo' => 'carmenprime@live.com',
            'id_cargo' => '3',
            'status' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Carmen Prime',
            'email' => 'carmenprime@live.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Media General',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);

        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Juan',
            'apellidos' => 'Sánchez',
            'nacionalidad' => 'V',
            'cedula' => '96838411',
            'fecha_nacimiento' => '1984-11-07',
            'edo_civil' => 'Soltero(a)',
            'direccion' => 'Calle Soublette, nro. 4, La Victoria.',
            'genero' => '1',
            'codigo_hab' => '1',
            'telf_hab' => '8080090',
            'codigo_cel' => '2',
            'celular' => '4343321',
            'correo' => 'juan@gmail.com',
            'id_cargo' => '4',
            'status' => '1'
        ]);        


        DB::table('users')->insert([

            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Basica',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);

        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Pedro',
            'apellidos' => 'Fernández',
            'nacionalidad' => 'V',
            'cedula' => '15332432',
            'fecha_nacimiento' => '1984-09-12',
            'edo_civil' => 'Soltero(a)',
            'direccion' => 'Calle Soublette, nro. 4, La Victoria.',
            'genero' => '1',
            'codigo_hab' => '1',
            'telf_hab' => '8080090',
            'codigo_cel' => '2',
            'celular' => '4343321',
            'correo' => 'pedro@gmail.com',
            'id_cargo' => '3',
            'status' => '1'
        ]);

        DB::table('users')->insert([

            'name' => 'Pedro',
            'email' => 'pedro@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Media General',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);

        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Ricardo',
            'apellidos' => 'Corsario',
            'nacionalidad' => 'V',
            'cedula' => '15332432',
            'fecha_nacimiento' => '1991-01-01',
            'edo_civil' => 'Soltero(a)',
            'direccion' => 'Calle Soublette, nro. 4, La Victoria.',
            'genero' => '1',
            'codigo_hab' => '1',
            'telf_hab' => '8080090',
            'codigo_cel' => '2',
            'celular' => '4343321',
            'correo' => 'ricardo@gmail.com',
            'id_cargo' => '5',
            'status' => '1'
        ]);

        DB::table('users')->insert([

            'name' => 'Ricardo',
            'email' => 'ricardo@gmail.com',
            'password' => bcrypt('qwerty'),
            'pregunta' => 'mascota',
            'respuesta' => 'scooby',
            'tipo_user' => 'Docente Preescolar',
            //---------------------------------- Estudiante
            'pre_re' => 'Si',
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
            'edit_notas_final' => 'Si',
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


            'status' => '1'
        ]);

        DB::table('datos_basicos_personal')->insert([
            'nombres' => 'Javier Adolfo',
            'apellidos' => 'Guevara Buffone',
            'nacionalidad' => 'V',
            'cedula' => '25071215',
            'fecha_nacimiento' => '1980-05-23',
            'edo_civil' => 'Soltero(a)',
            'direccion' => 'Calle Santiago Mariño, casa nro. 34',
            'genero' => '1',
            'codigo_hab' => '0',
            'telf_hab' => '8854854',
            'codigo_cel' => '3',
            'celular' => '4333233',
            'correo' => 'javier@gmail.com',
            'id_cargo' => '1',
            'status' => '1'
        ]);
    }
}
