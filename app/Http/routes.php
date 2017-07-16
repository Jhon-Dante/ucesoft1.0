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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {

    	Route::resource('/cursos','CursosController');
        Route::resource('/secciones','SeccionesController');
        Route::resource('/asignaturas','AsignaturasController');
        Route::resource('/periodos','PeriodosController');
        Route::resource('/tipo_pago','Tipo_pagoController');
        Route::resource('/DatosBasicos','DatosBasicosController');
        Route::resource('/cargos','CargosController');
        Route::resource('/personal','PersonalController');

        Route::get('/DatosBasicos/{id}/destroy',[
            'uses' => 'DatosBasicosController@destroy',
            'as' => 'admin.DatosBasicos.destroy']
            );
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

        Route::resource('/personal','PersonalController');
        Route::get('/personal/{id}/destroy',[
            'uses' => 'PersonalController@destroy',
            'as' => 'admin.personal.destroy']
            );
        Route::resource('/personal_asignatura','PersonalAsignaturaController');
        
        Route::resource('/calificaciones','CalificacionesController');

        Route::get('/docente_preescolar',function(){
            return View('admin.docente_preescolar.index');
        });

        Route::get('/docente_preescolar/momentos', function(){
            return View('admin.docente_preescolar.momentos.index');
        });

        Route::get('/docente_preescolar/momentos/create', function(){
            return View('admin.docente_preescolar.momentos.create');
        });

        Route::get('/docente_basica', function(){
            return View('admin.docente_basica.index');
        });

        Route::get('/docente_basica/lapsos', function(){
            return View('admin.docente_basica.lapsos.index');
        });

        Route::get('/docente_basica/lapsos/create', function(){
            return View('admin.docente_basica.lapsos.create');
        });



        Route::get('/docente_liceo', function(){
            return View('admin.docente_liceo.index');
        });

        Route::get('/docente_liceo/lapsos', function(){
            return View('admin.docente_liceo.lapsos.index');
        });

        Route::get('/docente_liceo/lapsos/create', function(){
            return View('admin.docente_liceo.lapsos.create');
        });

        Route::resource('/horario_tarde','HorarioTardeController');
        
    });

});
