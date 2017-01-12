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

	Route::resource('zona','ZonesController');
	Route::get('zona/{id}/destroy',[
		'uses' => 'ZonesController@destroy',
		'as' => 'zona.destroy'
	]);

	Route::get('zona/{zone_type_id}/{zone_id}/getZonasCreate',[
		'uses' => 'ZonesController@getTypeZones',
		'as' => 'zona.getZonas'
	]);

	Route::get('zona/{zone_type_id}/{zone_id}/getZonasEdit',[
		'uses' => 'ZonesController@getTypeZones',
		'as' => 'zona.getZonas'
	]);

	Route::resource('tipoTelefono','phoneTypesController');
	Route::get('tipoTelefono/{id}/destroy',[
		'uses' => 'phoneTypesController@destroy',
		'as' => 'tipoTelefono.destroy'
	]);

});

Route::group(['prefix'=>'administracion'],function(){

	Route::resource('cliente','customersController');
	Route::get('cliente/{id}/destroy',[
		'uses' => 'customersController@destroy',
		'as' => 'cliente.destroy'
	]);

	Route::resource('telefono','phonesController');
	Route::post('telefono/destroy',[
		'uses' => 'phonesController@destroy',
		'as' => 'telefono.destroy'
	]);

});


