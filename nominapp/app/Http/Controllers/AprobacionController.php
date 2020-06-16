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

class AprobacionController extends Controller
{
    public function index(Request $request){

        $empleados =Empleado::where('validacionEmpleado','=','0')->orderBy('created_at','desc')
        ->paginate(8);
        
        
        return view('AprobacionesEmpleados.index',["empleados"=>$empleados]);
    }   

    public function statusempleado($id){
        $tiporetiro= TipoRetiro::pluck('descripcionTipoRetiro','id');
        $tiendas= Tienda::pluck('nombreTienda','id');
        $tipocontrato= TipoContrato::pluck('descripcionTipoContrato','id');
        $tipocargo= TipoCargo::pluck('descripcionTipoCargo','id');
        $centrocosto= CentroCosto::pluck('descripcionCentroCostos','id');
        $division= Division::pluck('descripcionDivision','id');
        return view("AprobacionesEmpleados.changestatusempleado",["empleado"=>Empleado::findOrFail($id)],compact('tiporetiro','tipocontrato','tiendas','tipocargo','centrocosto','division'));
    }

    public function changestatusempleado(Request $request){
        $empleado =Empleado::findOrFail($request->get('cedula'));

        if($empleado->validacionEmpleado=='0'){

            $empleado =Empleado::findOrFail($request->get('cedula'));
            $empleado->nombreEmpleado=$request->get('nombreEmpleado');
            $empleado->apellidoEmpleado=$request->get('apellidoEmpleado');
            $empleado->fkidTienda=$request->get('fkidTienda');
            $empleado->fechaIngresoEmpleado=$request->get('fechaIngresoEmpleado');
            $empleado->fkidTipoContrato=$request->get('fkidTipoContrato');
            $empleado->fkidTipoCargo=$request->get('fkidTipoCargo');
            $empleado->fechaFinContratoEmpleado=$request->get('fechaFinContratoEmpleado');
            $empleado->fkcentroCostos=$request->get('fkcentroCostos');
            $empleado->fkdivision=$request->get('fkdivision');            
            $empleado->fechaRetiroEmpleado=$request->get('fechaRetiroEmpleado');
            $empleado->fkidTipoRetiro=$request->get('fkidTipoRetiro');
            $empleado->validacionEmpleado=('1'); 
            $empleado->update();
            return Redirect::to('AprobacionesEmpleados'); 

        }
    }
    
}
