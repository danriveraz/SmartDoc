<?php
/*Realizado por Daniel Alejandro Rivera, ing*/
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
//Inicio
Route::get('/', 'Auth\AuthController@getLogin');

//Login
Route::post('Auth/login', 'Auth\AuthController@postLogin');
Route::get('Auth/logout', 'Auth\AuthController@getLogout');


Route::get('Consultorio/', 'UserController@index');
Route::get('Registro', 'UserController@registro');

//Perfil admin
Route::get('Perfil/edit', ['uses' => 'UserController@postmodificarPerfil', 'as' => 'Auth.usuario.editPerfil']);
Route::get('Perfil', ['uses' => 'UserController@modificarPerfil', 'as' => 'Auth.usuario.showeditPerfil']);
Route::post('Perfil', ['uses'=>'UserController@imagen', 'as'=> 'user.imagen']);
Route::post('Configuracion', ['uses' => 'UserController@postmodificarConfiguracion', 'as' => 'Auth.usuario.editConfiguracion']);
Route::get('Configuracion', ['uses' => 'UserController@modificarConfiguracion', 'as' => 'Auth.usuario.showeditConfiguracion']);

//Personal
Route::post('Personal', ['uses' => 'PersonalController@postmodificarPersonal', 'as' => 'Auth.usuario.editPersonal']); ////Esta ruta es la principal de personal, sirve para crear.
Route::get('Personal', ['uses' => 'PersonalController@modificarPersonal', 'as' => 'Auth.usuario.showeditPersonal']);//Esta ruta es la principal de personal, sirve para crear.
Route::get('Personal/{id}/edit', ['uses' => 'PersonalController@postupdateProfile', 'as' => 'Auth.usuario.updateProfile']);//Esta ruta sirve para modificar un "personal"
Route::get('Personal/{id}/destroy', ['uses' => 'PersonalController@postdeleteProfile', 'as' => 'Auth.usuario.deleteProfile']);//Esta ruta sirve para eliminar un "personal"

//Procedimiento
Route::post('Procedimiento', ['uses' => 'ProcedimientoController@postmodificarProcedimiento', 'as' => 'Auth.usuario.editProcedimiento']); ////Esta ruta es la principal de Procedimiento, sirve para crear.
Route::get('Procedimiento', ['uses' => 'ProcedimientoController@modificarProcedimiento', 'as' => 'Auth.usuario.showeditProcedimiento']);//Esta ruta es la principal de Procedimiento, sirve para crear.
Route::get('Procedimiento/{id}/edit', ['uses' => 'ProcedimientoController@postupdateProcedimiento', 'as' => 'Auth.usuario.updateProcedimiento']);//Esta ruta sirve para modificar un "Procedimiento"
Route::get('Procedimiento/{id}/destroy', ['uses' => 'ProcedimientoController@postdeleteProcedimiento', 'as' => 'Auth.usuario.deleteProcedimiento']);//Esta ruta sirve para eliminar un "Procedimiento"

//Laboratorio
Route::post('Laboratorio', ['uses' => 'LaboratorioController@postcreateLaboratorio', 'as' => 'Auth.usuario.createLaboratorio']); ////Esta ruta es la principal de Laboratorio, sirve para crear.
Route::get('Laboratorio', ['uses' => 'LaboratorioController@createLaboratorio', 'as' => 'Auth.usuario.showcreateLaboratorio']);//Esta ruta es la principal de Laboratorio, sirve para crear.
Route::get('Laboratorio/{id}/edit', ['uses' => 'LaboratorioController@postupdateLaboratorio', 'as' => 'Auth.usuario.updateLaboratorio']);//Esta ruta sirve para modificar un "Procedimiento"
Route::get('Laboratorio/{id}/destroy', ['uses' => 'LaboratorioController@postdeleteLaboratorio', 'as' => 'Auth.usuario.deleteLaboratorio']);//Esta ruta sirve para eliminar un "Laboratorio"

//Cuentas
Route::get('Cuentas', 'CuentasController@index'); ////Esta ruta es la principal de Cuentas

//Servicio
Route::get('Servicio', ['uses' => 'ServicioController@createLaboratorio', 'as' => 'Auth.usuario.showcreateServicio']);//Esta ruta es la principal de Servicio, sirve para crear.
Route::get('Servicio/{id}/destroy', ['uses' => 'ServicioController@postdeleteServicio', 'as' => 'Auth.usuario.deleteServicio']);//Esta ruta sirve para eliminar un "Servicio"

Route::get('Abonos/', ['uses' => 'ServicioController@showpayment', 'as' => 'servicio.abonos']);//Esta ruta sirve para ver los abonos de un "Servicio"

Route::post('Abonos/abonar', ['uses' => 'ServicioController@dopayment', 'as' => 'servicio.abonar']);//Esta ruta sirve para ver los abonos de un "Servicio"

Route::post('Abonos/imprimir', ['uses' => 'ServicioController@printPayment', 'as' => 'abono.imprimir']);//Esta ruta sirve para ver los abonos de un "Servicio"

Route::post('Factura/', ['uses' => 'ServicioController@showInvoice', 'as' => 'factura']);//Esta ruta sirve para ver los abonos de un "Servicio"




Route::post('NuevoServicio', ['uses' => 'ServicioController@nuevo', 'as' => 'servicio.nuevo']);//Esta ruta es la principal de Agenda, sirve para crear.

//Historia clinica
Route::get('HistoriaClinica', ['uses' => 'HistoriaClinicaController@historiaClinica', 'as' => 'Auth.usuario.showHistoriaClinica']);//Esta ruta es la principal de Historia clinica.
Route::post('MakeHC', ['uses' => 'HistoriaClinicaController@createHistoriaClinica', 'as' => 'Auth.usuario.showCreateHistoriaClinica']);//Esta ruta es la principal de Historia clinica, sirve para crear.
Route::get('HistoriaClinica/{id}/edit', ['uses' => 'HistoriaClinicaController@edit', 'as' => 'historia.edit']);

Route::get('HistoriaClinica/{id}/observacion', ['uses' => 'HistoriaClinicaController@observacion', 'as' => 'historia.observacion']);

Route::get('observaciones', ['uses' => 'HistoriaClinicaController@observacionHistoriaClinica', 'as' => 'historia.observacionHistoriaClinica']);

Route::get('observaciones/{id}/create', ['uses' => 'HistoriaClinicaController@postcreateObservacion', 'as' => 'historia.postcreateObservacion']);

Route::get('observaciones/{id}/edit', ['uses' => 'HistoriaClinicaController@editObservacion', 'as' => 'historia.editObservacion']);

Route::get('observaciones/{id}/destroy', ['uses' => 'HistoriaClinicaController@postdeleteObservacion', 'as' => 'historia.postdeleteObservacion']);

Route::get('editHistoriaClinica', ['uses' => 'HistoriaClinicaController@editHistoriaClinica', 'as' => 'historia.editHistoriaClinica']);

Route::get('editHistoriaClinica/{id}/edit', ['uses' => 'HistoriaClinicaController@posteditHistoriaClinica', 'as' => 'historia.posteditHistoriaClinica']);

Route::get('editHistoriaClinica/{id}/observacion', ['uses' => 'HistoriaClinicaController@postobservacionHistoriaClinica', 'as' => 'historia.postobservacionHistoriaClinica']);
Route::get('editHistoriaClinica/{id}/destroy', ['uses' => 'HistoriaClinicaController@postdeleteHistoriaClinica', 'as' => 'historia.postdeleteHistoriaClinica']);


Route::get('ResetPassword', 'HomeController@resetPassword');
Route::get('ResetPassword/edit', ['uses' => 'HomeController@postresetPassword', 'as' => 'password.postresetPassword']);

Route::get('PocketCompany', 'HomeController@registroPropietario');

//Registro
Route::post('Auth/register', 'Auth\AuthController@postRegister');
Route::get('Auth/register', 'Auth\AuthController@getRegister');

//Agenda
//Agenda
Route::post('WelcomeAdmin', ['uses' => 'AgendaController@postcrearAgenda', 'as' => 'Auth.usuario.crearAgenda']);//Esta ruta es la principal de Agenda, sirve para crear.
Route::get('WelcomeAdmin/{id}/edit', ['uses' => 'AgendaController@posteditAgenda', 'as' => 'Auth.usuario.editarAgenda']);//Esta ruta es la principal de Agenda, sirve para editar.
Route::get('WelcomeAdmin/{id}/destroy', ['uses' => 'AgendaController@postdeleteAgenda', 'as' => 'Auth.usuario.eliminarAgenda']);//Esta ruta es la principal de Agenda, sirve para eliminar.

Route::get('WelcomeAdmin', 'WelcomeAdminController@index');
Route::get('WelcomeTrabajador', 'WelcomeTrabajadorController@index');

Route::post('Auth/verificarUser', 'UserController@verificarUser');