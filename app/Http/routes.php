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

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('Auth/login', 'Auth\AuthController@postLogin');
Route::get('Auth/logout', 'Auth\AuthController@getLogout');

Route::get('Consultorio/', 'UserController@index');
Route::get('Registro', 'UserController@registro');

Route::post('Perfil', ['uses' => 'UserController@postmodificarPerfil', 'as' => 'Auth.usuario.editPerfil']);
Route::get('Perfil', ['uses' => 'UserController@modificarPerfil', 'as' => 'Auth.usuario.showeditPerfil']);

Route::post('Configuracion', ['uses' => 'UserController@postmodificarConfiguracion', 'as' => 'Auth.usuario.editConfiguracion']);
Route::get('Configuracion', ['uses' => 'UserController@modificarConfiguracion', 'as' => 'Auth.usuario.showeditConfiguracion']);

Route::post('Personal', ['uses' => 'PersonalController@postmodificarPersonal', 'as' => 'Auth.usuario.editPersonal']); ////Esta ruta es la principal de personal, sirve para crear.
Route::get('Personal', ['uses' => 'PersonalController@modificarPersonal', 'as' => 'Auth.usuario.showeditPersonal']);//Esta ruta es la principal de personal, sirve para crear.
Route::get('Personal/{id}/edit', ['uses' => 'PersonalController@postupdateProfile', 'as' => 'Auth.usuario.updateProfile']);//Esta ruta sirve para modificar un "personal"
Route::get('Personal/{id}/destroy', ['uses' => 'PersonalController@postdeleteProfile', 'as' => 'Auth.usuario.deleteProfile']);//Esta ruta sirve para eliminar un "personal"

Route::post('Procedimiento', ['uses' => 'ProcedimientoController@postmodificarProcedimiento', 'as' => 'Auth.usuario.editProcedimiento']); ////Esta ruta es la principal de personal, sirve para crear.
Route::get('Procedimiento', ['uses' => 'ProcedimientoController@modificarProcedimiento', 'as' => 'Auth.usuario.showeditProcedimiento']);//Esta ruta es la principal de personal, sirve para crear.


Route::get('ResetPassword', 'HomeController@resetPassword');

Route::get('PocketCompany', 'UserController@registroPropietario');

Route::post('Auth/register', 'Auth\AuthController@postRegister');
Route::get('Auth/register', 'Auth\AuthController@getRegister');

Route::get('WelcomeAdmin', 'WelcomeAdminController@index');
Route::get('WelcomeTrabajador', 'WelcomeTrabajadorController@index');