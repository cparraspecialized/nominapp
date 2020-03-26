<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Ingreso;
use App\Empleado;
use DB;

class IngresoController extends Controller
{
    public function __construct(){

    }

    public function create(){

        $empleados= Empleado::pluck('cedula','cedula');

        return view('Ingresos.create',compact('empleados'));

        $empleados = Empleado::pluck('cedula');
        return View('Ingresos.index', compact('empleados'));

    }

    public function index(Request $request){

        $ingresos = DB::table('ingreso')->get();

        return view('Ingresos.index', ['ingresos' => $ingresos]);
    }

    public function store(Request $request){

       
        $ingreso=new Ingreso;
        $ingreso->fkcedulaEmpleado=$request->get('fkcedulaEmpleado');
        $ingreso->descripcionIngreso=$request->get('descripcionIngreso');
        $ingreso->fechaIngreso=$request->get('fechaIngreso');
        $ingreso->fkidUsuario=auth()->user()->id;
        
        $ingreso->save();
        
        return Redirect::to('Ingresos');
        

    }
}
