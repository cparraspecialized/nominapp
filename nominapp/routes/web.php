<?php
use App\Empleado;
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

    
    $Fija =Empleado::orderBy('created_at','desc')
    ->Where('empleados.tipoPosicion','=','Fija')->count();
    $Temporal =Empleado::orderBy('created_at','desc')
    ->Where('empleados.tipoPosicion','=','Temporal')->count();
    return view('home',["Fija"=>$Fija,"Temporal"=>$Temporal]);
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Users', 'UserController')->middleware('auth');
Route::resource('Tiendas', 'TiendaController')->middleware('auth');
Route::resource('Empleados', 'EmpleadoController')->middleware('auth');
Route::resource('TipoNovedad', 'TipoNovedadController')->middleware('auth');
Route::resource('Novedades', 'NovedadController')->middleware('auth');
Route::resource('TipoHoras', 'TipoHoraController')->middleware('auth');
Route::resource('HoraExtras', 'HoraExtraController')->middleware('auth');
Route::resource('TipoContratos', 'TipoContratoController')->middleware('auth');
Route::resource('TipoRetiros', 'TipoRetiroController')->middleware('auth');
Route::resource('TipoCargos', 'TipoCargoController')->middleware('auth');
Route::resource('Rol', 'RolController')->middleware('auth');
Route::resource('Salarios', 'SalarioController')->middleware('auth');
Route::resource('AprobacionesEmpleados', 'AprobacionController')->middleware('auth');
Route::resource('AprobacionesNovedades', 'AprobacionNovedadController')->middleware('auth');
Route::resource('AprobacionesHorasExtras', 'AprobacionHoraExtraController')->middleware('auth');
Route::resource('AprobacionesPersonal', 'AprobacionPersonalController')->middleware('auth');
Route::resource('Parametros', 'ParametroController')->middleware('auth');
//Route::get('/home', 'ReportesController@index');


Route::get('Empleados/status/{id}', 'EmpleadoController@status')->name('status');
Route::post('Empleados/changestatus/', 'EmpleadoController@changeStatus')->name('changestatus');
Route::post('Empleados/edit/', 'EmpleadoController@update')->name('editempleado');
Route::post('Users/edit/', 'UserController@update')->name('edituser');
Route::get('Salarios/editsalario/{id}', 'SalarioController@editsalario')->name('editsal');
Route::post('Salarios/update/', 'SalarioController@update')->name('updatesal');
Route::get('AprobacionesEmpleados/statusempleado/{id}', 'AprobacionController@statusempleado')->name('statusempleado');
Route::post('AprobacionesEmpleados/changestatusempleado/', 'AprobacionController@changestatusempleado')->name('changestatusempleado');
Route::get('AprobacionesPersonal/statuspersonal/{id}', 'AprobacionPersonalController@statuspersonal')->name('statuspersonal');
Route::post('AprobacionesPersonal/changestatuspersonal/', 'AprobacionPersonalController@changestatuspersonal')->name('changestatuspersonal');
Route::get('AprobacionesNovedades/statusnovedad/{id}', 'AprobacionNovedadController@statusnovedad')->name('statusnovedad');
Route::post('AprobacionesNovedades/changestatusnovedad/', 'AprobacionNovedadController@changestatusnovedad')->name('changestatusnovedad');
Route::get('AprobacionesHorasExtras/statushora/{id}', 'AprobacionHoraExtraController@statushora')->name('statushora');
Route::post('AprobacionesHorasExtras/changestatushora/', 'AprobacionHoraExtraController@changestatushora')->name('changestatushora');
Route::get('Salarios/bonificaciones','SalarioController@bonificaciones')->name('bonificaciones');
Route::get('Parametros/editparametro/{id}', 'ParametroController@editparametro')->name('editparametro');
Route::post('Parametros/update/', 'ParametroController@update')->name('updatepara');

Route::get('ExportEmpleados', 'EmpleadoController@export'); 
Route::get('ExportNovedades', 'NovedadController@export'); 
Route::get('ExportHoraExtra', 'HoraExtraController@export'); 
Route::get('ExportTipoHora', 'TipoHoraController@export');  
Route::get('ExportTipoRetiro', 'TipoRetiroController@export');  
Route::get('ExportTipoContrato', 'TipoContratoController@export');
Route::get('ExportTipoCargo', 'TipoCargoController@export');
Route::get('ExportTipoNovedad', 'TipoNovedadController@export');
Route::get('ExportTienda', 'TiendaController@export');
Route::get('ExportSalario', 'SalarioController@export');
