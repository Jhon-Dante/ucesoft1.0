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
    	Route::get('/cursos/{id}/destroy', [ 
			'uses' => 'CursosController@destroy',
			 'as' => 'admin.cursos.destroy']
			 );

        Route::resource('/secciones','SeccionesController');
        Route::get('/secciones/{id}/destroy', [
            'uses' => 'SeccionesController@destroy',
            'as' => 'admin.secciones.destroy']
            );

        Route::resource('/asignaturas','AsignaturasController');
        Route::get('/asignaturas/{id}/destroy',[
            'uses' => 'AsignaturasController@destroy',
            'as' => 'admin.asignaturas.destroy']
            );

        Route::resource('/DatosBasicos','DatosBasicosController');
        Route::get('/DatosBasicos/{id}/destroy',[
            'uses' => 'DatosBasicosController@destroy',
            'as' => 'admin.DatosBasicos.destroy']
            );
        Route::get('/DatosBasicos/{cedula}/verificarPadre',[
            'uses' => 'DatosBasicosController@verificarPadre',
            'as' => 'admin.DatosBasicos.verificarPadre'
            ]);
        
        Route::resource('/periodos','PeriodosController');
        Route::get('/periodos/{id}/destroy' ,[
            'uses' => 'PeriodosController@destroy',
            'as' => 'admin.periodos.destroy']
            );

        Route::resource('/tipo_pago','Tipo_pagoController');
        Route::get('/tipo_pago/{id}/destroy' ,[
            'uses' => 'Tipo_pagoController@destroy',
            'as' => 'admin.tipo_pago.destroy']
            );

        Route::resource('/deducciones','DeduccionesController');
        Route::get('/deducciones/{id}/destroy' ,[
            'uses' => 'DeduccionesController@destroy',
            'as' => 'admin.deducciones.destroy']
            );

        Route::resource('/pago_x_cestat','Pago_x_cestatController');
        Route::get('/pago_x_cestat/{id}/destroy' ,[
            'uses' => 'Pago_x_cestatController@destroy',
            'as' => 'admin.pago_x_cestat.destroy']
            );

        Route::resource('/retenciones','RetencionesController');
        Route::get('/retenciones/{id}/destroy' ,[
            'uses' => 'RetencionesController@destroy',
            'as' => 'admin.retenciones.destroy']
            );

        Route::resource('/aulas','AulasController');
        Route::get('/aulas/{id}/destroy' ,[
            'uses' => 'AulasController@destroy',
            'as' => 'admin.aulas.destroy']
            );
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

        Route::resource('/personal','PersonalController');
        Route::get('/personal/{id}/destroy', [
            'uses' => 'PersonalController@destroy',
            'as' => 'admin.personal.destroy']
            );
        

        
        Route::get('/mensualidades', function () {
    return view('admin.mensualidades.index');
        });
    });


});
