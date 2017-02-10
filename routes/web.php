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

	Route::resource('modulo','modulesController');
	Route::get('modulo/{id}/destroy',[
		'uses' => 'modulesController@destroy',
		'as' => 'modulo.destroy'
	]);

	Route::resource('deporte','sportsController');
	Route::get('deporte/{id}/destroy',[
		'uses' => 'sportsController@destroy',
		'as' => 'deporte.destroy'
	]);

	Route::resource('dia','daysController');
	Route::get('dia/{id}/destroy',[
		'uses' => 'daysController@destroy',
		'as' => 'dia.destroy'
	]);

	Route::resource('configuracion','configurationsController');
	Route::get('configuracion/{id}/destroy',[
		'uses' => 'configurationsController@destroy',
		'as' => 'configuracion.destroy'
	]);

	Route::resource('estadoDisponibilidad','availability_statusController');
	Route::get('estadoDisponibilidad/{id}/destroy',[
		'uses' => 'availability_statusController@destroy',
		'as' => 'estadoDisponibilidad.destroy'
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

	Route::resource('permiso','permissionsController');
	Route::get('permiso/{id}/destroy',[
		'uses' => 'permissionsController@destroy',
		'as' => 'permiso.destroy'
	]);

	Route::resource('rol','rolesController');
	Route::get('rol/{id}/destroy',[
		'uses' => 'rolesController@destroy',
		'as' => 'rol.destroy'
	]);

	Route::get('rol/{roleId}/permissions',[
		'uses' => 'rolesController@permissions',
		'as' => 'rol.permissions'
	]);

	Route::post('rol/permissionsStore',[
		'uses' => 'rolesController@permissionsStore',
		'as' => 'rol.permissionsStore'
	]);

	Route::post('rol/permissionsDelete',[
		'uses' => 'rolesController@permissionsDelete',
		'as' => 'rol.permissionsDelete'
	]);

	Route::post('rol/permissionsSave',[
		'uses' => 'rolesController@permissionsSave',
		'as' => 'rol.permissionsSave'
	]);

	Route::resource('usuario','usersController');
	Route::get('usuario/{id}/destroy',[
		'uses' => 'usersController@destroy',
		'as' => 'usuario.destroy'
	]);

	Route::resource('escenario','fieldsController');
	Route::get('escenario/{id}/destroy',[
		'uses' => 'fieldsController@destroy',
		'as' => 'escenario.destroy'
	]);

	Route::get('escenario/{id}/disponibility',[
		'uses' => 'fieldsController@disponibility',
		'as' => 'escenario.disponibility'
	]);

	Route::post('escenario/disponibilityStore',[
		'uses' => 'fieldsController@disponibilityStore',
		'as' => 'escenario.disponibilityStore'
	]);


	Route::get('disponibilidadEscenario/{field_id}/index',[
		'uses' => 'availabilities_fieldController@index',
		'as' => 'disponibilidadEscenario.index'
	]);

	Route::get('disponibilidadEscenario/{field_id}/create',[
		'uses' => 'availabilities_fieldController@create',
		'as' => 'disponibilidadEscenario.create'
	]);

	Route::post('disponibilidadEscenario/store',[
		'uses' => 'availabilities_fieldController@store',
		'as' => 'disponibilidadEscenario.store'
	]);

	Route::get('disponibilidadEscenario/{field_id}/{availability_field_id}/show',[
		'uses' => 'availabilities_fieldController@show',
		'as' => 'disponibilidadEscenario.show'
	]);

	Route::get('disponibilidadEscenario/{field_id}/{availability_field_id}/edit',[
		'uses' => 'availabilities_fieldController@edit',
		'as' => 'disponibilidadEscenario.edit'
	]);

	Route::post('disponibilidadEscenario/update',[
		'uses' => 'availabilities_fieldController@update',
		'as' => 'disponibilidadEscenario.update'
	]);

	Route::get('disponibilidadEscenario/{field_id}/{availability_field_id}/destroy',[
		'uses' => 'availabilities_fieldController@destroy',
		'as' => 'disponibilidadEscenario.destroy'
	]);


	Route::resource('duracionReserva','availability_timeController');
	Route::get('duracionReserva/{id}/destroy',[
		'uses' => 'availability_timeController@destroy',
		'as' => 'duracionReserva.destroy'
	]);

	Route::resource('precio','pricesController');
	Route::get('precio/{id}/destroy',[
		'uses' => 'pricesController@destroy',
		'as' => 'precio.destroy'
	]);

	Route::resource('disponibilidad','availabilitiesController');
	Route::get('disponibilidad/{id}/destroy',[
		'uses' => 'availabilitiesController@destroy',
		'as' => 'disponibilidad.destroy'
	]);


	Route::resource('generarDisponibilidad','generate_availabilitiesController');
	Route::get('generarDisponibilidad/{id}/destroy',[
		'uses' => 'generate_availabilitiesController@destroy',
		'as' => 'generarDisponibilidad.destroy'
	]);

	Route::post('generarDisponibilidad/update',[
		'uses' => 'generate_availabilitiesController@update',
		'as' => 'generarDisponibilidad.update'
	]);

	Route::post('generarDisponibilidad/showFields',[
		'uses' => 'generate_availabilitiesController@showFields',
		'as' => 'generarDisponibilidad.showFields'
	]);

	Route::post('generarDisponibilidad/showAvailabilities',[
		'uses' => 'generate_availabilitiesController@showAvailabilities',
		'as' => 'generarDisponibilidad.showAvailabilities'
	]);

});

Route::group(['prefix'=>'reservas'],function(){

	Route::resource('reservable','reservablesController');

});


