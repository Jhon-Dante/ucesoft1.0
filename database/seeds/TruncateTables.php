<?php

use Illuminate\Database\Seeder;
    	
class TruncateTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::select('SET FOREIGN_KEY_CHECKS=0');
    	DB::select('TRUNCATE asignaturas');
    	DB::select('TRUNCATE asignaturas_inscripcion');
    	DB::select('TRUNCATE asignaturas_pendientes');
    	DB::select('TRUNCATE asignaturas_pendientes_final');
    	DB::select('TRUNCATE asignaturas_preinscripcion');
    	DB::select('TRUNCATE aulas');
    	DB::select('TRUNCATE bloques');
    	DB::select('TRUNCATE bloques2');
    	DB::select('TRUNCATE boletin');
    	DB::select('TRUNCATE boletin_final');
    	DB::select('TRUNCATE calificaciones');
    	DB::select('TRUNCATE cargos');
    	DB::select('TRUNCATE cursos');
    	DB::select('TRUNCATE datos_basicos');
    	DB::select('TRUNCATE datos_basicos_has_padres');
    	DB::select('TRUNCATE datos_basicos_personal');
    	DB::select('TRUNCATE dias');
    	DB::select('TRUNCATE horarios');
    	DB::select('TRUNCATE horarios2');
    	DB::select('TRUNCATE inscripcion');
    	DB::select('TRUNCATE items_evaluacion');
    	DB::select('TRUNCATE mensualidades');
    	DB::select('TRUNCATE mensualidades_pagos');
    	DB::select('TRUNCATE meses');
    	DB::select('TRUNCATE migrations');
    	DB::select('TRUNCATE momentos');
    	DB::select('TRUNCATE padres');
    	DB::select('TRUNCATE pagos');
    	DB::select('TRUNCATE parentesco');
    	DB::select('TRUNCATE password_resets');
    	DB::select('TRUNCATE periodos');
    	DB::select('TRUNCATE personalp_has_secciones');
    	DB::select('TRUNCATE personal_guia');
    	DB::select('TRUNCATE personal_has_asignatura');
    	DB::select('TRUNCATE preinscripcion');
    	DB::select('TRUNCATE recaudos');
    	DB::select('TRUNCATE reportes_nuevos');
    	DB::select('TRUNCATE reporte_final');
    	DB::select('TRUNCATE representantes');
    	DB::select('TRUNCATE roles');
    	DB::select('TRUNCATE secciones');
    	DB::select('TRUNCATE sugerencias');
    	DB::select('TRUNCATE temas_evaluacion');
    	DB::select('TRUNCATE tipo_empleado');
    	DB::select('TRUNCATE totales');
    	DB::select('TRUNCATE users');
    	DB::select('SET FOREIGN_KEY_CHECKS=1');
    	 }
}
