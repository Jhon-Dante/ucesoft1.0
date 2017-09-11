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
        Route::get('/DatosBasicos/{cedula}/verificarPadre',[
            'uses' => 'DatosBasicosController@verificarPadre',
            'as' => 'admin.DatosBasicos.verificarPadre'
            ]);
        
        

        // Route::resource('/deducciones','DeduccionesController');
        // Route::get('/deducciones/{id}/destroy' ,[
        //     'uses' => 'DeduccionesController@destroy',
        //     'as' => 'admin.deducciones.destroy']
        //     );

        // Route::resource('/pago_x_cestat','Pago_x_cestatController');

        // Route::resource('/retenciones','RetencionesController');
        // Route::get('/retenciones/{id}/destroy' ,[
        //     'uses' => 'RetencionesController@destroy',
        //     'as' => 'admin.retenciones.destroy']
        //     );

        Route::resource('/aulas','AulasController');

        Route::resource('/horarios','HorariosController');
        Route::get('/horarios/{id}/destroy' ,[
            'uses' => 'HorariosController@destroy',
            'as' => 'admin.horarios.destroy']
            );
        Route::resource('/cargos','CargosController');
        Route::get('/cargos/{id}/destroy' ,[
            'uses' => 'CargosController@destroy',
            'as' => 'admin.cargos.destroy']
            );
        
      
        

        Route::resource('/representantes','RepresentantesController');
        Route::get('/representantes/{id}/destroy',[
            'uses' => 'RepresentantesController@destroy',
            'as' => 'admin.representantes.destroy']
            );

        

        
        Route::get('/mensualidades', function () {
    return view('admin.mensualidades.index');
        });

       

        Route::resource('/mensualidades','MensualidadesController');
        Route::get('/mensualidades/{id}/destroy',[
            'uses' => 'MensualidadesController@destroy',
            'as' => 'admin.mensualidades.destroy']
            );

        Route::resource('/personal_asignatura','PersonalAsignaturaController');
        
        Route::resource('/calificaciones','CalificacionesController');

        


        Route::get('/docente_basica', function(){
            return View('admin.docente_basica.index');
        });

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
});

