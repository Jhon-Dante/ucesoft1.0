<?php

use Illuminate\Database\Seeder;

class DropTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::select('SET FOREIGN_KEY_CHECKS=0');
        DB::select('DROP TABLE asignaturas, asignaturas_inscripcion, asignaturas_pendientes, asignaturas_pendientes_final, asignaturas_preinscripcion, aulas, bloques, bloques2, boletin, boletin_final, calificaciones, cargos, cursos, datos_basicos, datos_basicos_has_padres, datos_basicos_personal, dias, horarios, horarios2, inscripcion, items_evaluacion, mensualidades, meses, migrations, momentos, padres, pagos, parentesco, password_resets, periodos, personalp_has_secciones, personal_guia, personal_has_asignatura, preinscripcion, recaudos, reportes_nuevos, reporte_final, representantes, roles, secciones, sugerencias, temas_evaluacion, tipo_empleado, totales, users','remediales','auditoria');
        DB::select('SET FOREIGN_KEY_CHECKS=1');
    }
}
