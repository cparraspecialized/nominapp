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

Route::resource('Tiendas', 'TiendaController');
Route::resource('Empleados', 'EmpleadoController');
Route::resource('TipoNovedad', 'TipoNovedadController');
Route::resource('Novedades', 'NovedadController');
Route::resource('TipoHoras', 'TipoHoraController');
Route::resource('HoraExtras', 'HoraExtraController');
Route::resource('TipoContratos', 'TipoContratoController');
Route::resource('TipoRetiros', 'TipoRetiroController');
Route::resource('TipoCargos', 'TipoCargoController');


Route::get('Empleados/status/{id}', 'EmpleadoController@status')->name('status');
Route::post('Empleados/changestatus/', 'EmpleadoController@changeStatus')->name('changestatus');
Route::post('Empleados/edit/', 'EmpleadoController@update')->name('editempleado');





  