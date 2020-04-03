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
use Carbon\Carbon;
use App\Exports\EmpleadoExport;
use Exception;
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

    }

    public function index(Request $request){

        if($request){

        $cedula=trim($request->get('cedula'));
        $nombreEmpleado=trim($request->get('nombreEmpleado'));
        $apellidoEmpleado=trim($request->get('apellidoEmpleado'));
        $fkidTienda=trim($request->get('fkidTienda'));
        $empleados =Empleado::orderBy('created_at','desc')
        ->where('cedula','like','%'.$cedula.'%')
        ->where('nombreEmpleado','like','%'.$nombreEmpleado.'%')
        ->where('apellidoEmpleado','like','%'.$apellidoEmpleado.'%')
        ->where('fkidTienda','like','%'.$fkidTienda.'%')
        ->paginate(8);

        return view('Empleados.index', compact('empleados'));

        }
    }

    public function store(storeEmpleadoRequest $request){

       try {

            DB::BeginTransaction();
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

            if ($empleado->save()) {
                DB::commit();
                return redirect()->route('Empleados.index')->with('info','Empleado creado con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear el Empleado ya Existe');

       }

          
       
         
        

    }

    public function edit($id){

        $tiporetiro= TipoRetiro::pluck('descripcionTipoRetiro','id');
        $tiendas= Tienda::pluck('nombreTienda','id');
        $tipocontrato= TipoContrato::pluck('descripcionTipoContrato','id');
        $tipocargo= TipoCargo::pluck('descripcionTipoCargo','id');
     
        return view("Empleados.edit",["empleado"=>Empleado::findOrFail($id)],compact('tiporetiro','tipocontrato','tiendas','tipocargo'));

    }


    public function update(Request $request, $id){

        $empleado =Empleado::findOrFail($id);

        if($empleado->estadoEmpleado=='ACTIVO'){

        
            $empleado =Empleado::findOrFail($id);
            $empleado->nombreEmpleado=$request->get('nombreEmpleado');
            $empleado->apellidoEmpleado=$request->get('apellidoEmpleado');
            $empleado->fkidTienda=$request->get('fkidTienda');
            $empleado->fechaIngresoEmpleado=$request->get('fechaIngresoEmpleado');
            $empleado->fkidTipoContrato=$request->get('fkidTipoContrato');
            $empleado->fkidTipoCargo=$request->get('fkidTipoCargo');
            $empleado->sueldoEmpleado=$request->get('sueldoEmpleado');
            $empleado->fkidUsuario=auth()->user()->id;   
            $empleado->update();
            
            return Redirect::to('Empleados'); 
        }else{

            
            $empleado =Empleado::findOrFail($id);
            $empleado->nombreEmpleado=$request->get('nombreEmpleado');
            $empleado->apellidoEmpleado=$request->get('apellidoEmpleado');
            $empleado->fechaRetiroEmpleado=$request->get('fechaRetiroEmpleado');
            $empleado->fkidTipoRetiro=$request->get('fkidTipoRetiro');
            $empleado->fkidUsuario=auth()->user()->id;   
            $empleado->update();

        }
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

        $tiporetiro= TipoRetiro::pluck('descripcionTipoRetiro','id');
        $tiendas= Tienda::pluck('nombreTienda','id');
        $tipocontrato= TipoContrato::pluck('descripcionTipoContrato','id');
        $tipocargo= TipoCargo::pluck('descripcionTipoCargo','id');

        return view("Empleados.edit",["empleado"=>Empleado::findOrFail($id)],compact('tiporetiro','tipocontrato','tiendas','tipocargo'));
    }

    public function export(Request $request){

        $cedula=trim($request->get('cedula'));
        $nombreEmpleado=trim($request->get('nombreEmpleado'));
        $apellidoEmpleado=trim($request->get('apellidoEmpleado'));
        $fkidTienda=trim($request->get('fkidTienda'));
        $empleados =Empleado::orderBy('created_at','desc')
        ->where('cedula','like','%'.$cedula.'%')
        ->where('nombreEmpleado','like','%'.$nombreEmpleado.'%')
        ->where('apellidoEmpleado','like','%'.$apellidoEmpleado.'%')
        ->where('fkidTienda','like','%'.$fkidTienda.'%')
        ->get();

        return (new EmpleadoExport($empleados))->download('Empleados.xlsx');


   
}

   
    

}
