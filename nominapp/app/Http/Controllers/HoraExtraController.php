<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeHoraExtraRequest;
use Illuminate\Http\Request;
use App\HoraExtra;
use App\TipoHora;
use App\Empleado;
use Exception;
use Carbon\Carbon;
use App\Exports\HoraExtraExport;
use Maatwebsite\Excel\Facades\Excel;

use DB;

class HoraExtraController extends Controller
{
    public function __construct(){

    }

    public function create(){

        $tipohoras= TipoHora::pluck('descripcionTipo','id');

        if (auth()->user()->rol['tipo_Rol'] == 'Administrador'){
            $empleados= Empleado::select(DB::raw('CONCAT(nombreEmpleado," ",apellidoEmpleado) as nombre'),'cedula')
            ->get()->pluck('nombre','cedula');
        }else{
            $empleados= Empleado::select(DB::raw('CONCAT(nombreEmpleado," ",apellidoEmpleado) as nombre'),'cedula')
            ->where('fkidTienda','=',auth()->user()->tiendas['id'])
            ->get()->pluck('nombre','cedula');
        }  
        
        return view('HoraExtras.create',compact('empleados','tipohoras'));
        
    }

    public function index(Request $request){

        if (auth()->user()->rol['tipo_Rol'] == 'Administrador') {
            $empleados= Empleado::select(DB::raw('CONCAT(nombreEmpleado," ",apellidoEmpleado) as nombre'),'cedula')
            ->get()->pluck('nombre','cedula');
            $tipohoraextra= TipoHora::pluck('descripcionTipo','id');

            $fkcedulaEmpleado=trim($request->get('fkcedulaEmpleado'));
            $fkidTipoHora=trim($request->get('fkidTipoHora'));
            $fechaHorasExtra=trim($request->get('fechaHorasExtra'));
            $fechafinHorasExtra=trim($request->get('fechafinHorasExtra'));

            if($fechaHorasExtra == null){
                $fechaHorasExtra='01/01/1900';
            }
            if($fkcedulaEmpleado == ""){
                $horasextras =HoraExtra::where('validacionHora','=','1')->orderBy('id','desc')
                ->where('fkcedulaEmpleado','like','%'.$fkcedulaEmpleado.'%')
                ->where('fkidTipoHora','like','%'.$fkidTipoHora.'%')
                ->whereBetween('fechaHorasExtra', [Carbon::parse($fechaHorasExtra)->startOfDay(), Carbon::parse($fechafinHorasExtra)->endOfDay()])
                ->paginate(10);
            }else{
                $horasextras =HoraExtra::where('validacionHora','=','1')->orderBy('id','desc')
                ->where('fkcedulaEmpleado','=',$fkcedulaEmpleado)
                ->where('fkidTipoHora','like','%'.$fkidTipoHora.'%')
                ->whereBetween('fechaHorasExtra', [Carbon::parse($fechaHorasExtra)->startOfDay(), Carbon::parse($fechafinHorasExtra)->endOfDay()])
                ->paginate(10);
            }

            
            return view('HoraExtras.index',['fkcedulaEmpleado'=>$fkcedulaEmpleado,'fkidTipoHora'=>$fkidTipoHora,'fechaHorasExtra'=>$fechaHorasExtra,'fechafinHorasExtra'=>$fechafinHorasExtra],compact('horasextras','empleados','tipohoraextra'));
        }else{
            $empleados= Empleado::select(DB::raw('CONCAT(nombreEmpleado," ",apellidoEmpleado) as nombre'),'cedula')
            ->where('fkidTienda','=',auth()->user()->tiendas['id'])
            ->get()->pluck('nombre','cedula');
            $tipohoraextra= TipoHora::pluck('descripcionTipo','id');

            $fkcedulaEmpleado=trim($request->get('fkcedulaEmpleado'));
            $fkidTipoHora=trim($request->get('fkidTipoHora'));
            $fechaHorasExtra=trim($request->get('fechaHorasExtra'));
            $fechafinHorasExtra=trim($request->get('fechafinHorasExtra'));

            if($fechaHorasExtra == null){
                $fechaHorasExtra='01/01/1900';
            }


            $horasextras =HoraExtra::where('validacionHora','=','1')->orderBy('id','desc')
            ->join('empleados','fkcedulaEmpleado','=','empleados.cedula')
            ->where('fkcedulaEmpleado','like','%'.$fkcedulaEmpleado.'%')
            ->where('fkidTipoHora','like','%'.$fkidTipoHora.'%')
            ->where('empleados.fkidTienda','=',auth()->user()->tiendas['id'])
            ->whereBetween('fechaHorasExtra', [Carbon::parse($fechaHorasExtra)->startOfDay(), Carbon::parse($fechafinHorasExtra)->endOfDay()])
            ->paginate(10);

            return view('HoraExtras.index',['fkcedulaEmpleado'=>$fkcedulaEmpleado,'fkidTipoHora'=>$fkidTipoHora,'fechaHorasExtra'=>$fechaHorasExtra,'fechafinHorasExtra'=>$fechafinHorasExtra],compact('horasextras','empleados','tipohoraextra'));
        }    
    }

    public function store(storeHoraExtraRequest $request){

        $startDate = Carbon::now();
        $startDay =  Carbon::now()->startOfMonth();

      

      
        
        $horaextr=new HoraExtra;
        
        $horasmes = HoraExtra::where('fkcedulaEmpleado','=',$request->get('fkcedulaEmpleado'))->whereBetween('fechaHorasExtra', [$startDay,$startDate])->sum('horasExtra');
                
        if($horasmes+$request->get('horasExtra')<48){
        
        try {
        DB::BeginTransaction();

     

        
        $horaextr->fkidTipoHora=$request->get('fkidTipoHora');
        $horaextr->fkcedulaEmpleado=$request->get('fkcedulaEmpleado');        
        $horaextr->horasExtra=$request->get('horasExtra');
        $horaextr->fechaHorasExtra=$request->get('fechaHorasExtra');
        $horaextr->observacionHoraExtra=$request->get('observacionHoraExtra');
        $horaextr->fkidUsuario=auth()->user()->id;  

        
        
        if ($horaextr->save()) {
            DB::commit();
            return redirect()->route('HoraExtras.index')->with('info','Hora extra generada con exito'); 
        }
            
        } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear la hora Extra');
        }

    }else{
        return back()->with('error', 'El empleado tiene mas de 48 horas en este mes');
    }
        
    }

    public function export(Request $request){

        $fkcedulaEmpleado=trim($request->get('fkcedulaEmpleado'));
        $fkidTipoHora=trim($request->get('fkidTipoHora'));
        $fechaHorasExtra=trim($request->get('fechaHorasExtra'));
        $fechafinHorasExtra=trim($request->get('fechafinHorasExtra'));

        if (auth()->user()->rol['tipo_Rol'] == 'Administrador') {

            if($fechaHorasExtra == null){
                $fechaHorasExtra='01/01/1900';
            }   

            if($fkcedulaEmpleado == ""){
                $horasextras =DB::table('hora_extras')
                ->join('empleados','fkcedulaEmpleado','=','empleados.cedula')
                ->join('tiendas','empleados.fkidTienda','=','tiendas.id')
                ->join('tipohoras','fkidTipoHora','=','tipohoras.id')
                ->where('hora_extras.fkcedulaEmpleado','like','%'.$fkcedulaEmpleado.'%')
                ->where('hora_extras.fkidTipoHora','like','%'.$fkidTipoHora.'%')
                ->whereBetween('fechaHorasExtra', [Carbon::parse($fechaHorasExtra)->startOfDay(), Carbon::parse($fechafinHorasExtra)->endOfDay()])
                ->where('validacionHora','=','1')
                ->select(   'hora_extras.fkcedulaEmpleado',
                            'empleados.nombreEmpleado',
                            'empleados.apellidoEmpleado',
                            'tiendas.nombreTienda',
                            'tipohoras.descripcionTipo',
                            'hora_extras.horasExtra',
                            'hora_extras.fechaHorasExtra',
                            'hora_extras.observacionHoraExtra'
                            )
                ->get();

            }else
            {
                $horasextras =DB::table('hora_extras')
                ->join('empleados','fkcedulaEmpleado','=','empleados.cedula')
                ->join('tiendas','empleados.fkidTienda','=','tiendas.id')
                ->join('tipohoras','fkidTipoHora','=','tipohoras.id')
                ->where('hora_extras.fkcedulaEmpleado','=',$fkcedulaEmpleado)
                ->where('hora_extras.fkidTipoHora','like','%'.$fkidTipoHora.'%')
                ->whereBetween('fechaHorasExtra', [Carbon::parse($fechaHorasExtra)->startOfDay(), Carbon::parse($fechafinHorasExtra)->endOfDay()])
                ->where('validacionHora','=','1')
                ->select(   'hora_extras.fkcedulaEmpleado',
                            'empleados.nombreEmpleado',
                            'empleados.apellidoEmpleado',
                            'tiendas.nombreTienda',
                            'tipohoras.descripcionTipo',
                            'hora_extras.horasExtra',
                            'hora_extras.fechaHorasExtra',
                            'hora_extras.observacionHoraExtra'
                            )
                ->get();
            }

        }else{

            if($fechaHorasExtra == null){
                $fechaHorasExtra='01/01/1900';
            }   

            if($fkcedulaEmpleado == ""){
                $horasextras =DB::table('hora_extras')
                ->join('empleados','fkcedulaEmpleado','=','empleados.cedula')
                ->join('tiendas','empleados.fkidTienda','=','tiendas.id')
                ->join('tipohoras','fkidTipoHora','=','tipohoras.id')
                ->where('hora_extras.fkcedulaEmpleado','like','%'.$fkcedulaEmpleado.'%')
                ->where('hora_extras.fkidTipoHora','like','%'.$fkidTipoHora.'%')
                ->where('empleados.fkidTienda','=',auth()->user()->tiendas['id'])
                ->whereBetween('fechaHorasExtra', [Carbon::parse($fechaHorasExtra)->startOfDay(), Carbon::parse($fechafinHorasExtra)->endOfDay()])
                ->where('validacionHora','=','1')
                ->select(   'hora_extras.fkcedulaEmpleado',
                            'empleados.nombreEmpleado',
                            'empleados.apellidoEmpleado',
                            'tiendas.nombreTienda',
                            'tipohoras.descripcionTipo',
                            'hora_extras.horasExtra',
                            'hora_extras.fechaHorasExtra',
                            'hora_extras.observacionHoraExtra'
                            )
                ->get();

            }
            else{

                $horasextras =DB::table('hora_extras')
                ->join('empleados','fkcedulaEmpleado','=','empleados.cedula')
                ->join('tiendas','empleados.fkidTienda','=','tiendas.id')
                ->join('tipohoras','fkidTipoHora','=','tipohoras.id')
                ->where('hora_extras.fkcedulaEmpleado','=',$fkcedulaEmpleado)
                ->where('empleados.fkidTienda','=',auth()->user()->tiendas['id'])
                ->where('hora_extras.fkidTipoHora','like','%'.$fkidTipoHora.'%')
                ->whereBetween('fechaHorasExtra', [Carbon::parse($fechaHorasExtra)->startOfDay(), Carbon::parse($fechafinHorasExtra)->endOfDay()])
                ->where('validacionHora','=','1')
                ->select(   'hora_extras.fkcedulaEmpleado',
                            'empleados.nombreEmpleado',
                            'empleados.apellidoEmpleado',
                            'tiendas.nombreTienda',
                            'tipohoras.descripcionTipo',
                            'hora_extras.horasExtra',
                            'hora_extras.fechaHorasExtra',
                            'hora_extras.observacionHoraExtra'
                            )
                ->get();
            }

        }

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];
       

        return Excel::download(new HoraExtraExport($horasextras), 'HorasExtras'.$d.$m.$y.'.xlsx');

   
    }   
}