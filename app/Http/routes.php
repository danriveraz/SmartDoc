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

Route::get('consultorio/', 'UserController@index');
Route::get('registro', 'UserController@registro');

Route::get('pocketCompany', 'UserController@registroPropietario');

Route::post('Auth/register', 'Auth\AuthController@postRegister');
Route::get('Auth/register', 'Auth\AuthController@getRegister');

Route::get('WelcomeAdmin', 'WelcomeAdminController@index');
Route::get('WelcomeTrabajador', 'WelcomeTrabajadorController@index');
