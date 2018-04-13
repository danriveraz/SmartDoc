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

Route::post('Personal', ['uses' => 'PersonalController@postmodificarPersonal', 'as' => 'Auth.usuario.editPersonal']);
Route::get('Personal', ['uses' => 'PersonalController@modificarPersonal', 'as' => 'Auth.usuario.showeditPersonal']);
Route::get('Personal{id}', ['uses' => 'PersonalController@postupdateProfile', 'as' => 'Auth.usuario.updateProfile']);

Route::get('ResetPassword', 'HomeController@resetPassword');

Route::get('PocketCompany', 'UserController@registroPropietario');

Route::post('Auth/register', 'Auth\AuthController@postRegister');
Route::get('Auth/register', 'Auth\AuthController@getRegister');

Route::get('WelcomeAdmin', 'WelcomeAdminController@index');
Route::get('WelcomeTrabajador', 'WelcomeTrabajadorController@index');