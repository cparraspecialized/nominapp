<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\TipoNovedad;
use App\Novedad;
use App\Empleado;
use App\Exports\NovedadExport;
use App\Http\Requests\storeNovedadRequest;
use DB;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class NovedadController extends Controller
{
    public function __construct(){

    }

    public function create(){

        $tnovedades= TipoNovedad::pluck('descripcionTipoNovedad','id');
        $empleados= Empleado::pluck('cedula','cedula');

        return view('Novedades.create',compact('tnovedades','empleados'));
    }

    public function index(Request $request){

        $empleados= Empleado::pluck('cedula','cedula');
        $tiponovedad= TipoNovedad::pluck('descripcionTipoNovedad','id');

        $fkcedulaEmpleado=trim($request->get('fkcedulaEmpleado'));
        $fechaInicioNovedad=trim($request->get('fechaInicioNovedad'));
        $fechaFinNovedad=trim($request->get('fechaFinNovedad'));
        $fkTipoNovedad=trim($request->get('fkTipoNovedad'));


        if($fechaInicioNovedad == null){
            $fechaInicioNovedad='01/01/1900';
        }

        $novedades =Novedad::orderBy('id','desc')
        ->where('fkcedulaEmpleado','like','%'.$fkcedulaEmpleado.'%')
        ->where('fkTipoNovedad','like','%'.$fkTipoNovedad.'%')
        ->whereBetween('fechaNovedad', [Carbon::parse($fechaInicioNovedad)->startOfDay(), Carbon::parse($fechaFinNovedad)->endOfDay()])
        ->paginate(10);

        return view('Novedades.index',['fkcedulaEmpleado'=>$fkcedulaEmpleado,'fkTipoNovedad'=>$fkTipoNovedad,'fechaInicioNovedad'=>$fechaInicioNovedad,'fechaFinNovedad'=>$fechaFinNovedad] ,compact('novedades','empleados','tiponovedad'));
    }

    public function store(storeNovedadRequest $request){

        try {

            DB::BeginTransaction();
       
        $novedad=new Novedad;
        $novedad->fkcedulaEmpleado=$request->get('fkcedulaEmpleado');
        $novedad->fechaNovedad=$request->get('fechaNovedad');
        $novedad->fechaFinNovedad=$request->get('fechaFinNovedad');
        $novedad->fkidUsuario=auth()->user()->id;
        $novedad->fktipoNovedad=$request->get('fktipoNovedad');
        $novedad->observacionNovedad=$request->get('observacionNovedad');

        
        if ($novedad->save()) {
            DB::commit();
            return redirect()->route('Novedades.index')->with('info','Novedad creada con exito'); 
        }

   } catch (Exception $e) {
        DB::rollback();
        $msg = $e->getMessage();
        return back()->with('error', 'Error al crear la novedad'.$e);

   }
      

        
        return Redirect::to('Novedades');
        

    }

    public function export(Request $request){

        $fkcedulaEmpleado=trim($request->get('fkcedulaEmpleado'));
        $fechaInicioNovedad=trim($request->get('fechaInicioNovedad'));
        $fechaFinNovedad=trim($request->get('fechaFinNovedad'));
        $fkTipoNovedad=trim($request->get('fkTipoNovedad'));

        if($fechaInicioNovedad == null){
            $fechaInicioNovedad='01/01/1900';
        }

        $novedades =DB::table('novedades')
        ->join('empleados','fkcedulaEmpleado','=','empleados.cedula')
        ->join('tiendas','empleados.fkidTienda','=','tiendas.id')
        ->join('tipo_novedades','fkTipoNovedad','=','tipo_novedades.id')
        ->where('novedades.fkcedulaEmpleado','like','%'.$fkcedulaEmpleado.'%')
        ->where('novedades.fkTipoNovedad','like','%'.$fkTipoNovedad.'%')
        ->whereBetween('fechaNovedad', [Carbon::parse($fechaInicioNovedad)->startOfDay(), Carbon::parse($fechaFinNovedad)->endOfDay()])
        ->select(   'novedades.fkcedulaEmpleado',
                    'empleados.nombreEmpleado',
                    'empleados.apellidoEmpleado',
                    'tiendas.nombreTienda',
                    'tipo_novedades.descripcionTipoNovedad',
                    'novedades.fechaNovedad',
                    'novedades.observacionNovedad'
                    )
        ->get();
        
        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
         $y = $hoy['year'];
       
        //return (new EmpleadoExport($empleados,$cedula,$nombreEmpleado,$apellidoEmpleado,$fkidTienda))->download('Empleados.xlsx');

        

        return Excel::download(new NovedadExport($novedades), 'Novedades'.$d.$m.$y.'.xlsx');

   
}   

}
