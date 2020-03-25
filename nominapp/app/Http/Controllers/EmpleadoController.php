<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tienda;
use App\Empleado;
use DB;

class EmpleadoController extends Controller
{
    public function __construct(){

    }

    public function create(){

        $tiendas= Tienda::pluck('nombreTienda','id');

        return view('Empleados.create',compact('tiendas'));

        $tiendas = Tienda::pluck('nombreTienda');
        return View('Empleados.index', compact('tiendas'));

    }

    public function index(Request $request){

        $empleados = DB::table('empleados')->get();

        return view('Empleados.index', ['empleados' => $empleados]);
    }

    public function store(Request $request){

        $empleado=new Empleado;
        $empleado->cedula=$request->get('cedula');
        $empleado->nombreEmpleado=$request->get('nombreEmpleado');
        $empleado->apellidoEmpleado=$request->get('apellidoEmpleado');
        $empleado->fkidTienda=$request->get('fkidTienda');
        $empleado->estadoEmpleado=('ACTIVO');
        $empleado->save();

        return Redirect::to('Empleados');

    }

}
