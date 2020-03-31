<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tienda;
use App\Empleado;
use App\TipoCargo;
use App\TipoContrato;
use App\TipoRetiro;
use App\Http\Requests\storeEmpleadoRequest;
use DB;

class EmpleadoController extends Controller
{
    public function __construct(){

    }

    public function create(){

        $tiendas= Tienda::pluck('nombreTienda','id');
        $tipocargo= TipoCargo::pluck('descripcionTipoCargo','id');
        $tipocontrato= TipoContrato::pluck('descripcionTipoContrato','id');


        return view('Empleados.create',compact('tiendas','tipocargo','tipocontrato'));

        $tiendas = Tienda::pluck('nombreTienda');
        return View('Empleados.index', compact('tiendas'));

    }

    public function index(Request $request){

        $empleados =Empleado::orderBy('created_at','desc')->paginate(10);

        return view('Empleados.index', compact('empleados'));
    }

    public function store(storeEmpleadoRequest $request){

        $empleado=new Empleado;
        $empleado->cedula=$request->get('cedula');
        $empleado->nombreEmpleado=$request->get('nombreEmpleado');
        $empleado->apellidoEmpleado=$request->get('apellidoEmpleado');
        $empleado->fkidTienda=$request->get('fkidTienda');
        $empleado->estadoEmpleado=('ACTIVO');
        $empleado->fechaIngresoEmpleado=$request->get('fechaIngresoEmpleado');
        $empleado->fkidTipoContrato=$request->get('fkidTipoContrato');
        $empleado->fkidTipoCargo=$request->get('fkidTipoCargo');
        $empleado->sueldoEmpleado=$request->get('sueldoEmpleado');
        $empleado->fechaRetiroEmpleado=null;
        $empleado->fkidTipoRetiro=null;
        $empleado->fkidUsuario=auth()->user()->id;    
        $empleado->save();

        return Redirect::to('Empleados');

    }

    public function status($id){

        $tiporetiro= TipoRetiro::pluck('descripcionTipoRetiro','id');
        $tipocontrato= TipoContrato::pluck('descripcionTipoContrato','id');
        return view("Empleados.changestatus",["empleado"=>Empleado::findOrFail($id)],compact('tiporetiro','tipocontrato'));

    }

    public function changeStatus(Request $request){

        $empleado =Empleado::findOrFail($request->get('cedula'));
        
        if($empleado->estadoEmpleado=='ACTIVO'){

            $empleado =Empleado::findOrFail($request->get('cedula'));
            $empleado->fechaRetiroEmpleado=$request->get('fechaRetiroEmpleado');
            $empleado->fkidTipoRetiro=$request->get('fkidTipoRetiro');
            $empleado->fkidUsuario=auth()->user()->id; 
            $empleado->estadoEmpleado=('INACTIVO'); 
            $empleado->update();
            return Redirect::to('Empleados'); 

        }else{

            $empleado =Empleado::findOrFail($request->get('cedula'));
            $empleado->fechaRetiroEmpleado=null;
            $empleado->fkidTipoRetiro=null;
            $empleado->fkidTipoContrato=$request->get('fkidTipoContrato');
            $empleado->fechaIngresoEmpleado=$request->get('fechaIngresoEmpleado');
            $empleado->fkidUsuario=auth()->user()->id; 
            $empleado->estadoEmpleado=('ACTIVO'); 
            $empleado->update();
            return Redirect::to('Empleados');

        }

        return Redirect::to('Empleados');

    }

    public function show($id){

        return view("Empleados.changestatus",["empleado"=>Empleado::findOrFail($id)],compact('tiporetiro'));
    }

    public function editEmpleado($id){

        $tiporetiro= TipoRetiro::pluck('descripcionTipoRetiro','id');
        $tiendas= Tienda::pluck('nombreTienda','id');
        $tipocontrato= TipoContrato::pluck('descripcionTipoContrato','id');
        $tipocargo= TipoCargo::pluck('descripcionTipoCargo','id');

        return view("Empleados.editempleado",["empleado"=>Empleado::findOrFail($id)],compact('tiporetiro','tipocontrato','tiendas','tipocargo'));

    }

    public function updateEmpleado(Request $request){
        
        $empleado =Empleado::findOrFail($request->get('cedula'));
        
        if($empleado->estadoEmpleado=='ACTIVO'){

            $empleado =Empleado::findOrFail($request->get('cedula'));
            $empleado->nombreEmpleado=$request->get('nombreEmpleado');
            $empleado->apellidoEmpleado=$request->get('apellidoEmpleado');
            $empleado->fkidTienda=$request->get('fkidTienda');
            $empleado->fechaIngresoEmpleado=$request->get('fechaIngresoEmpleado');
            $empleado->fkidTipoContrato=$request->get('fkidTipoContrato');
            $empleado->fkidTipoCargo=$request->get('fkidTipoCargo');
            $empleado->sueldoEmpleado=$request->get('sueldoEmpleado');
            $empleado->fechaRetiroEmpleado=null;
            $empleado->fkidTipoRetiro=null;
            $empleado->fkidUsuario=auth()->user()->id;   
            $empleado->update();
            return Redirect::to('Empleados'); 

        }else{

            $empleado =Empleado::findOrFail($request->get('cedula'));
            $empleado->nombreEmpleado=$request->get('nombreEmpleado');
            $empleado->apellidoEmpleado=$request->get('apellidoEmpleado');
            $empleado->fkidTienda=$request->get('fkidTienda');
            $empleado->fkidTipoCargo=$request->get('fkidTipoCargo');
            $empleado->sueldoEmpleado=$request->get('sueldoEmpleado');
            $empleado->fechaRetiroEmpleado=$request->get('fechaRetiroEmpleado');
            $empleado->fkidTipoRetiro=$request->get('fkidTipoRetiro');
            $empleado->fkidUsuario=auth()->user()->id;   
            $empleado->update();
            return Redirect::to('Empleados'); 

        }

        return Redirect::to('Empleados');
    }

}
