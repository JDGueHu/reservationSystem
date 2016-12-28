<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba',function(){
	echo "Esta es la ruta de prueba";
});

Route::group(['prefix'=>'configuracion'],function(){

	Route::resource('tipoIdentificacion','Identification_typesController');
	Route::get('tipoIdentificacion/{id}/destroy',[
		'uses' => 'Identification_typesController@destroy',
		'as' => 'tipoIdentificacion.destroy'
	]);

	Route::resource('tipoZona','Zone_typesController');
	Route::get('tipoZona/{id}/destroy',[
		'uses' => 'Zone_typesController@destroy',
		'as' => 'tipoZona.destroy'
	]);



});


