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
Route::resource('Ingresos', 'IngresoController');
Route::resource('Retiros', 'RetiroController');
Route::resource('TipoHoras', 'TipoHoraController');
Route::resource('HoraExtras', 'HoraExtraController');