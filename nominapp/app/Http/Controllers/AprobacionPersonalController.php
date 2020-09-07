<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tienda;
use App\Empleado;
use App\TipoCargo;
use App\TipoContrato;
use App\TipoRetiro;
use App\CentroCosto;
use App\Division;
use Carbon\Carbon;
use Exception;
use DB;

class AprobacionPersonalController extends Controller
{
    public function index(Request $request){

        $empleados =Empleado::where('validacionRetiro','=','0')->orderBy('created_at','desc')
        ->paginate(8);
        
        
        return view('AprobacionesPersonal.index',["empleados"=>$empleados]);
    }   

    public function statuspersonal($id){
        $tiporetiro= TipoRetiro::pluck('descripcionTipoRetiro','id');
        $tiendas= Tienda::pluck('nombreTienda','id');
        $tipocontrato= TipoContrato::pluck('descripcionTipoContrato','id');
        $tipocargo= TipoCargo::pluck('descripcionTipoCargo','id');
        $centrocosto= CentroCosto::pluck('descripcionCentroCostos','id');
        $division= Division::pluck('descripcionDivision','id');
        return view("AprobacionesPersonal.changestatuspersonal",["empleado"=>Empleado::findOrFail($id)],compact('tiporetiro','tipocontrato','tiendas','tipocargo','centrocosto','division'));
    }

    public function changestatuspersonal(Request $request){
        $empleado =Empleado::findOrFail($request->get('cedula'));

        if($empleado->validacionRetiro=='0'){

            if($empleado->estadoEmpleado=='ACTIVO'){

                $empleado =Empleado::findOrFail($request->get('cedula'));
                $empleado->fechaRetiroEmpleado=$request->get('fechaRetiroEmpleado');
                $empleado->fkidTipoRetiro=$request->get('fkidTipoRetiro');
                $empleado->fkidUsuario=auth()->user()->id; 
                $empleado->estadoEmpleado=('ACTIVO');
                $empleado->validacionRetiro=1;
                $empleado->update();
                return Redirect::to('AprobacionesPersonal'); 
    
            }else{
    
                $empleado =Empleado::findOrFail($request->get('cedula'));
                $empleado->fechaRetiroEmpleado=null;
                $empleado->fkidTipoRetiro=null;
                $empleado->fkidTipoContrato=$request->get('fkidTipoContrato');
                $empleado->fechaIngresoEmpleado=$request->get('fechaIngresoEmpleado');
                $empleado->fkidUsuario=auth()->user()->id; 
                $empleado->estadoEmpleado=('INACTIVO');
                $empleado->validacionRetiro=1;
                $empleado->update();
                return Redirect::to('AprobacionesPersonal');
    
            }

        }
    }
}
