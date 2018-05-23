<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('pregunta');
            $table->string('respuesta');
            $table->enum('tipo_user',['Administrador(a)','Secretario(a)','Docente Media General','Docente Básica','Docente Preescolar','Representante']);
            $table->string('foto');
            //---------------------------------- Estudiante
            $table->enum('pre_re',['Si','No']);
            $table->enum('list_estu',['Si','No']);
            $table->enum('edit_estu',['Si','No']);
            $table->enum('eli_estu',['Si','No']);
            $table->enum('const_estu',['Si','No']);
            $table->enum('cer_estu',['Si','No']);
            $table->enum('titulob_estu',['Si','No']);
            //---------------------------------- Representante
            $table->enum('list_repre',['Si','No']);
            $table->enum('create_repre',['Si','No']);
            $table->enum('edit_repre',['Si','No']);
            //---------------------------------- mensualidades
            $table->enum('pag_mensu',['Si','No']);
            $table->enum('edit_montos',['Si','No']);
            $table->enum('edit_monto_m',['Si','No']);
            //---------------------------------- calificaciones
            $table->enum('edit_cali_pre',['Si','No']);
            $table->enum('edit_cali_basic',['Si','No']);
            $table->enum('edit_cali_media',['Si','No']);
            $table->enum('edit_notas_final',['Si','No']);

            //---------------------------------- Horarios
            $table->enum('gen_horario',['Si','No']);
            //---------------------------------- personal
            $table->enum('list_perso',['Si','No']);
            $table->enum('create_perso',['Si','No']);
            $table->enum('edit_perso',['Si','No']);
            $table->enum('act/desac_perso',['Si','No']);
            $table->enum('asig_car_aca',['Si','No']);
            $table->enum('asig_guia',['Si','No']);
            $table->enum('list_guia',['Si','No']);
            //---------------------------------- config
                //------------------------------------- usuarios
                $table->enum('list_user',['Si','No']);
                $table->enum('list_edit',['Si','No']);
                //------------------------------------- asignaturas
                $table->enum('list_asig',['Si','No']);
                $table->enum('create_asig',['Si','No']);
                $table->enum('edit_asig',['Si','No']);
                $table->enum('elim_asig',['Si','No']);
                //------------------------------------- auditoria
                $table->enum('list_auditoria',['Si','No']);
                //------------------------------------- aulas
                $table->enum('list_aula',['Si','No']);
                $table->enum('create_aula',['Si','No']);
                $table->enum('edit_aula',['Si','No']);
                $table->enum('elim_aula',['Si','No']);
                //------------------------------------- cargos
                $table->enum('list_cargo',['Si','No']);
                $table->enum('create_cargo',['Si','No']);
                $table->enum('edit_cargo',['Si','No']);
                $table->enum('elim_cargo',['Si','No']);
                //------------------------------------- periodos
                $table->enum('list_periodo',['Si','No']);
                $table->enum('create_periodo',['Si','No']);
                $table->enum('edit_periodo',['Si','No']);
                $table->enum('elim_periodo',['Si','No']);
                $table->enum('act/desac_periodo',['Si','No']);
                //------------------------------------- respaldar BD
                $table->enum('res_BD',['Si','No']);
                //------------------------------------- Secciones
                $table->enum('list_seccion',['Si','No']);
                $table->enum('create_seccion',['Si','No']);
                $table->enum('edit_seccion',['Si','No']);
                $table->enum('elim_seccion',['Si','No']);

            //-----------------------------------
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
