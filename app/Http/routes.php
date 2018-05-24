<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () { return view('welcome'); });

Route::group(['middleware' => 'guest'], function () {
    // poder usar las apginas sin inicio de sesion
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        //auth donde estan los mensajes de error
        Route::resource('/profile','UserController');
        Route::resource('/bloques','BloquesController');

        Route::get('/usuarios',[
            'uses' => 'UserController@inicio',
            'as' => 'admin.usuarios'
        ]);
        Route::post('/profile/editar',[
            'uses' => 'UserController@actualizar',
            'as' => 'admin.profile.editar'

        ]);
        Route::post('/profile/actualizar',[
            'uses' => 'UserController@update',
            'as' => 'admin.profile.update'

        ]);


    	Route::resource('/cursos','CursosController');
        Route::resource('/secciones','SeccionesController');
        Route::resource('/asignaturas','AsignaturasController');
        Route::resource('/periodos','PeriodosController');
        
        //---- ESTUDIANTES-----
        Route::resource('/DatosBasicos','DatosBasicosController');
        Route::get('/DatosBasicos/reinscribir',[
                'uses' => 'DatosBasicosController@reinscribir',
                'as' => 'admin.DatosBasicos.reinscribir'
            ]);
        Route::post('/DatosBasicos/actualiza/',[
                'uses' => 'DatosBasicosController@actualiza',
                'as' => 'admin.DatosBasicos.actualiza'
            ]);

        Route::get('/cursos/{id}/busca',[
            'uses' => 'DatosBasicosController@buscarcurso',
            'as' => 'admin.cursos.buscarsecciones'
        ]);

        Route::post('/DatosBasicos/buscarEstudiante',[
                'uses' => 'DatosBasicosController@buscarEstudiante',
                'as' => 'admin.DatosBasicos.buscarEstudiante'
            ]);
        Route::post('/DatosBasicos/reinscribir',[
                'uses' => 'DatosBasicosController@reinscribir',
                'as' => 'admin.DatosBasicos.reinscribir'
            ]);
        //------------
        Route::resource('/cargos','CargosController');
        Route::resource('/personal','PersonalController');

        Route::get('/horarios/{id}/buscar',[
            'uses' => 'HorariosController@buscarbloques',
            'as' => 'admin.horarios.buscar'
        ]);

        Route::get('/personales/{id}/buscar',[
            'uses' => 'PersonalAsignaturaController@buscarpersonal',
            'as' => 'admin.personales.buscar'
            ]);

        Route::get('/horarios/{id}/buscar',[
            'uses' => 'HorariosController@buscarasignatura',
            'as' => 'admin.horarios.buscar'
            ]);

        Route::get('/personal/{id}/status',[
            'uses' => 'PersonalController@editarStatus',
            'as' => 'admin.personal.status'
        ]);
        Route::get('/usuario/{id}/status',[
            'uses' => 'UserController@editarStatus',
            'as' => 'admin.usuario.status'
        ]);
        Route::post('/usuario/editar_per',[
            'uses' => 'UserController@editarPermisos',
            'as' => 'admin.usuario.editar_per'
        ]);
        Route::get('/asignatura/{id}/status',[
            'uses' => 'AsignaturasController@editarStatus',
            'as' => 'admin.asignatura.status'
        ]);
        Route::get('/aula/{id}/status',[
            'uses' => 'AulasController@editarStatus',
            'as' => 'admin.aula.status'
        ]);
        Route::get('/representante/{id}/status',[
            'uses' => 'RepresentantesController@editarStatus',
            'as' => 'admin.representante.status'
        ]);
        Route::get('/seccion/{id}/status',[
            'uses' => 'SeccionesController@editarStatus',
            'as' => 'admin.seccion.status'
        ]);
        
        Route::get('/cursos/{id}/buscar',[
            'uses' => 'PersonalAsignaturaController@buscarsecciones',
            'as' => 'admin.cursos.buscarsecciones'
            ]);

        Route::get('/asignaturas/{id}/buscar',[
            'uses' => 'PersonalAsignaturaController@buscarasignaturas',
            'as' => 'admin.asignaturas.buscarasignaturas'
            ]);
        Route::get('/guias',[
            'uses' => 'PersonalAsignaturaController@buscarseccionguia',
            'as' => 'admin.personal_asignatura.buscarseccionguia'
            ]);
        Route::post('/asignar',[
            'uses' => 'PersonalAsignaturaController@asignar',
            'as' => 'admin.personal_asignatura.asignar'
            ]);
        Route::get('/personal_asignatura/guias',[
            'uses' => 'PersonalAsignaturaController@listarguias',
            'as' => 'admin.personal_asignatura.guias'
            ]);
        Route::get('/personal_asignatura/{id}/editar_guia',[
            'uses' => 'PersonalAsignaturaController@editar_guia',
            'as' => 'admin.personal_asignatura.editar_guia'
            ]);
        Route::post('/personal_asignatura/actualizar_asignar',[
            'uses' => 'PersonalAsignaturaController@actualizar_asignar',
            'as' => 'admin.personal_asignatura.actualizar_asignar'
            ]);
        Route::get('/personal_asignatura/buscar_rectificar',[
            'uses' => 'PersonalAsignaturaController@buscar_rectificar',
            'as' => 'admin.personal_asignatura.buscar_rectificar'
            ]);
        Route::get('/DatosBasicos/{cedula}/verificarPadre',[
            'uses' => 'DatosBasicosController@verificarPadre',
            'as' => 'admin.DatosBasicos.verificarPadre'
            ]);
        Route::get('/personal_asignatura/actualizar_asignacion_mg',[
            'uses' => 'PersonalAsignaturaController@actualizar_asignacion_mg',
            'as' => 'admin.personal_asignatura.actualizar_asignacion_mg'
            ]);
        
        

        Route::resource('/aulas','AulasController');

        Route::resource('/horarios','HorariosController');
        Route::post('/horarios/destruir' ,[
            'uses' => 'HorariosController@destruir',
            'as' => 'admin.horarios.destruir']
            );
        Route::get('/crearhorario/{id_seccion}/{id_periodo}',[
            'uses' => 'HorariosController@crear',
            'as' => 'admin.crearhorario']);

        Route::get('/mostrarhorario/{id_seccion}/{id_periodo}',[
            'uses' => 'HorariosController@mostrarhorario',
            'as' => 'admin.mostrarhorario']);

        Route::post('/crearmomento',[
            'uses' => 'PreescolarController@crear',
            'as' => 'admin.crearmomento']);

        Route::post('/editarmomento',[
            'uses' => 'PreescolarController@editar',
            'as' => 'admin.editarmomento']);

        Route::post('/editamomento',[
            'uses' => 'PreescolarController@update',
            'as' => 'admin.editamomento']);

        Route::resource('/cargos','CargosController');
        Route::get('/cargos/{id}/destroy' ,[
            'uses' => 'CargosController@destroy',
            'as' => 'admin.cargos.destroy']
            );

        Route::get('/mostrarmomento/{reporte}/{id_seccion}/{id_periodo}',[
            'uses' => 'PreescolarController@mostrarmomento',
            'as' => 'admin.mostrarmomento']);

        Route::get('/mostrarmomento2/{id_seccion}/{id_periodo}',[
            'uses' => 'PreescolarController@mostrarmomento2',
            'as' => 'admin.mostrarmomento2']);

        Route::get('/preescolar/update',[
            'uses' => 'PreescolarController@update',
            'as' => 'admin.preescolar.update']);
      
        Route::get('/mostrarlapso_basica/{id_seccion}/{id_periodo}',[
            'uses' => 'boletinController@mostrar',
            'as' => 'admin.mostrarlapso_basica']);

        Route::post('/editarlapso_basica',[
            'uses' => 'boletinController@editar',
            'as' => 'admin.editarlapso_basica']);

        Route::post('/editarlapso_media',[
            'uses' => 'MediaGeneralController@editar',
            'as' => 'admin.editarlapso_media']);

        Route::post('/actualizarlapso_basica',[
            'uses' => 'boletinController@actualizarlapso',
            'as' => 'admin.actualizarlapso_basica']);

        Route::post('/actualizarlapso_media',[
            'uses' => 'MediaGeneralController@actualizarlapso',
            'as' => 'admin.actualizarlapso_media']);

        Route::get('/mostrarlapso_media/{id_seccion}/{id_periodo}',[
            'uses' => 'MediaGeneralController@mostrar',
            'as' => 'admin.mostrarlapso_media']);



        Route::resource('/representantes','RepresentantesController');
        Route::get('/representantes/{id}/destroy',[
            'uses' => 'RepresentantesController@destroy',
            'as' => 'admin.representantes.destroy']
            );

       

        Route::resource('/mensualidades','MensualidadesController');
        Route::get('/mensualidades/contabilidad',[
            'uses' => 'MensualidadesController@contabilidad',
            'as' => 'admin.mensualidades.contabilidad'
            ]);
        Route::get('/mensualidad/{id}/buscar',[
            'uses' => 'MensualidadesController@buscar',
            'as' => 'admin.mensualidad.buscar'
            ]);

        Route::resource('/personal_asignatura','PersonalAsignaturaController');

        Route::get('/personalasignatura/listado',[
            'uses' => 'PersonalAsignaturaController@listado',
            'as' => 'admin.personalasignatura.listado'
            ]);
        
        Route::resource('/calificaciones','CalificacionesController');

        Route::get('/auditoria',[
            'uses' => 'HomeController@auditoria',
            'as' => 'admin.personal.auditoria'
        ]);

        // Route::get('/docente_basica/lapsos', function(){
        //     return View('admin.docente_basica.lapsos.index');
        // });

        // Route::get('/docente_basica/lapsos/create', function(){
        //     return View('admin.docente_basica.lapsos.create');
        // });



        // Route::get('/docente_liceo', function(){
        //     return View('admin.docente_liceo.index');
        // });

        // Route::get('/docente_liceo/lapsos', function(){
        //     return View('admin.docente_liceo.lapsos.index');
        // });

        // Route::get('/docente_liceo/lapsos/create', function(){
        //     return View('admin.docente_liceo.lapsos.create');
        // });

        Route::resource('/horario_tarde','HorarioTardeController');

        Route::resource('/tipo_empleado', 'TipoEmpleadoController');
        Route::get('/tipo_empleado/{id}/destroy',[
            'uses' => 'TipoEmpleadoController@destroy',
            'as' => 'admin.tipo_personal.destroy']
            );
        
        Route::resource('/preescolar','PreescolarController');

        Route::resource('/educacion_basica','BoletinController');
        
        Route::resource('/educacion_media','MediaGeneralController');
        Route::post('/crearlapso_media',[
            'uses' => 'MediaGeneralController@crear',
            'as' => 'admin.crearlapso_media']);

        Route::get('/educacion_media/{i}/{id_datosBasicos}/{id_periodo}', ['uses' => 'MediaGeneralController@pdf', 'as' => 'admin.educacion_media.pdf']);

        Route::post('calificaciones/buscarruta',[
            'uses' => 'PersonalController@buscarruta',
            'as' => 'admin.calificaciones.buscarruta']);
        
         Route::get('preescolar/calificaciones/{id_seccion}/{id_periodo}', [
            'uses' => 'PreescolarController@pdf',
            'as' => 'admin.calificaciones.pdf']);
        

         Route::get('preescolar/calificaciones2/{id_datosBasicos}/{id_seccion}/{id_periodo}/{reporte}', [
            'uses' => 'PreescolarController@boletinPreescolarEstudiante',
            'as' => 'admin.calificaciones.pdf2']);

         Route::get('basica/boletin/{id_seccion}/{id_periodo}', [
            'uses' => 'BoletinController@pdf',
            'as' => 'admin.boletin.pdf']);

         Route::get('basica/boletin2/{id_datosBasicos}/{id_seccion}/{id_periodo}/{lapso}', [
            'uses' => 'BoletinController@boletinBasicaEstudiante',
            'as' => 'admin.boletin.pdf2']);

         Route::get('media/boletin/{id_seccion}/{id_periodo}', [
            'uses' => 'MediaGeneralController@pdf',
            'as' => 'admin.media_general.pdf']);

         Route::get('media/boletin2/{id_datosBasicos}/{id_seccion}/{id_periodo}/{lapso}', [
            'uses' => 'MediaGeneralController@boletinMediaEstudiante',
            'as' => 'admin.media_general.pdf2']);

         Route::post('/crearlapso_basica',[
            'uses' => 'BoletinController@crear',
            'as' => 'admin.crearlapso_basica']);

          //pagos

         Route::resource('/pagos_monto','PagosController');


         Route::get('/notas',[
            'uses' => 'MediaGeneralController@notas',
            'as' => 'admin.notas']);

         Route::get('/notas2',[
            'uses' => 'MediaGeneralController@notas2',
            'as' => 'admin.notas2']);

        //-------- RESPALDOS Y RESTAURACION --------//

        Route::resource('respaldos', 'BackupController');
        Route::get('respaldos/download/{file_name}', ['uses' => 'BackupController@download', 'as' => 'admin.respaldos.download']);
        Route::get('respaldos/restore/{file_name}', ['uses' => 'BackupController@restore', 'as' => 'admin.respaldos.restore']);
        Route::get('respaldos/subir', ['uses' => 'BackupController@subir', 'as' => 'admin.respaldos.subir']);
        Route::post('respaldos/subirRestore', ['uses' => 'BackupController@subirRestore', 'as' => 'admin.respaldos.subirRestore']);
        Route::get('respaldos/restore/{file_name}', ['uses' => 'BackupController@restore', 'as' => 'admin.respaldos.restore']);

         // -----------------Actas------------------//
         Route::get('/constancia',[
            'uses' => 'DatosBasicosController@constancia',
            'as' => 'admin.constancia'
         ]);

         Route::post('/mostrarConstancia',[
            'uses' => 'DatosBasicosController@mostrarConstancia',
            'as' => 'admin.mostrarConstancia'
         ]);

         Route::get('/constanciaC',[
            'uses' => 'DatosBasicosController@constanciaC',
            'as' => 'admin.ConstanciaC'
         ]);

         Route::post('/mostrarConstanciaC',[
            'uses' => 'DatosBasicosController@mostrarConstanciaC',
            'as' => 'admin.mostrarConstanciaC'
         ]);

         Route::get('/tituloB',[
            'uses' => 'DatosBasicosController@tituloB',
            'as' => 'admin.tituloB'
         ]);
         
         Route::post('/mostrarTituloB',[
            'uses' => 'DatosBasicosController@mostrarTituloB',
            'as' => 'admin.mostrarTituloB'
         ]);

         Route::resource('/remediales','RemedialesController');

         //ruta para seleccionar el docente a subir carga
         Route::get('/calificacionesadmin/{tipo}',[
            'uses' => 'PersonalController@buscartipodocente',
            'as' => 'admin.personal.buscartipodocente'
         ]);

         Route::resource('/notas_finales','NotasFinalesController');


         
});
        
        

