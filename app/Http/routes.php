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
        
    });


});
