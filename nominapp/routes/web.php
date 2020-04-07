<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Tiendas', 'TiendaController')->middleware('auth');
Route::resource('Empleados', 'EmpleadoController')->middleware('auth');
Route::resource('TipoNovedad', 'TipoNovedadController')->middleware('auth');
Route::resource('Novedades', 'NovedadController')->middleware('auth');
Route::resource('TipoHoras', 'TipoHoraController')->middleware('auth');
Route::resource('HoraExtras', 'HoraExtraController')->middleware('auth');
Route::resource('TipoContratos', 'TipoContratoController')->middleware('auth');
Route::resource('TipoRetiros', 'TipoRetiroController')->middleware('auth');
Route::resource('TipoCargos', 'TipoCargoController')->middleware('auth');


Route::get('Empleados/status/{id}', 'EmpleadoController@status')->name('status');
Route::post('Empleados/changestatus/', 'EmpleadoController@changeStatus')->name('changestatus');
Route::post('Empleados/edit/', 'EmpleadoController@update')->name('editempleado');

Route::get('ExportEmpleados', 'EmpleadoController@export'); 
Route::get('ExportNovedades', 'NovedadController@export'); 
Route::get('ExportHoraExtra', 'HoraExtraController@export'); 





  