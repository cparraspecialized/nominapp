<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SalarioFormRequest;
use App\Salario;
use App\Tienda;
use App\Empleado;
use App\Http\Requests\StoreSalarioRequest;
use App\Exports\SalarioExport;
use Carbon\Carbon;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class SalarioController extends Controller
{
    public function __construct(){

    }

    public function create(){

        $empleados = Empleado::select(DB::raw('CONCAT(nombreEmpleado," ",apellidoEmpleado) as nombre'),'cedula')
        ->LEFTJOIN('salarios','fkCedulaEmpleado','=','empleados.cedula')
        ->WHERE('empleados.cedula','!=','salarios.fkCedulaEmpleado')
        ->WHERENULL('salarios.fkCedulaEmpleado')
        ->get()->pluck('nombre','cedula');
        return view('Salarios.create',compact('empleados'));

    } 

    public function index(Request $request){
        
        $empleados= Empleado::select(DB::raw('CONCAT(nombreEmpleado," ",apellidoEmpleado) as nombre'),'cedula')
        ->get()->pluck('nombre','cedula');
        $fkcedulaEmpleado=trim($request->get('fkCedulaEmpleado'));
        $salario = Salario::orderBy('id','desc') 
        ->where('fkCedulaEmpleado','like','%'.$fkcedulaEmpleado.'%')   
        ->paginate(8);

        return view('Salarios.index',['fkCedulaEmpleado'=>$fkcedulaEmpleado], compact('salario','empleados'));       
    }

    public function show(Request $request){
        $empleados = Empleado::select(DB::raw('CONCAT(nombreEmpleado," ",apellidoEmpleado) as nombre'),'cedula')
        ->get()->pluck('nombre','cedula');
        $fkcedulaEmpleado=trim($request->get('fkCedulaEmpleado'));
        $salario = Salario::join('empleados','salarios.fkCedulaEmpleado','=','empleados.cedula')
        ->join('tiendas','empleados.fkidTienda','=','tiendas.id')
        ->where('tiendas.nombreTienda','!=','OFICINA')
        ->where('tiendas.nombreTienda','!=','CEDI')
        ->where('salarios.fkCedulaEmpleado','like','%'.$fkcedulaEmpleado.'%')
        ->select('salarios.id as ids','salarios.fkCedulaEmpleado' ,'salarios.bonificacion', 'salarios.fkidUsuario')
        ->orderby('salarios.id', 'desc')
        ->paginate(8);
        return view('Salarios.bonificaciones',['fkCedulaEmpleado'=>$fkcedulaEmpleado], compact('salario','empleados'));       
    }

    

    public function store(Request $request){

        try {

            DB::BeginTransaction();
            $salario=new Salario;
            $salario->fkCedulaEmpleado=$request->get('fkCedulaEmpleado');
            $salario->salarioBase=$request->get('salarioBase');
            $salario->bonificacion=$request->get('bonificacion');
            $salario->auxilioTransporte=$request->get('auxilioTransporte');
            $salario->auxilioTransporteEspecial=$request->get('auxilioTransporteEspecial');
            $salario->auxilioCapacitacion=$request->get('auxilioCapacitacion');
            $salario->auxilioComunicacion=$request->get('auxilioComunicacion');
            $salario->gastoRepresentacion=$request->get('gastoRepresentacion');
            $salario->auxilioMedicinaPrepagada=$request->get('auxilioMedicinaPrepagada');
            $salario->fkidUsuario=auth()->user()->id; 
            if ($salario->save()) {
                DB::commit();
                return redirect()->route('Salarios.index')->with('info','Salario creada con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear el salario'.$e);

       }
    }

    public function editsalario($id){

        $empleados= Empleado::pluck('nombreEmpleado','cedula');
        return view("Salarios.editsalario",["salario"=>Salario::findOrFail($id)],compact('empleados'));

    }


    public function update(Request $request, $id){
        $salario =Salario::findOrFail($request->id);  
        $salario->salarioBase=$request->get('salarioBase');
        $salario->bonificacion=$request->get('bonificacion');
        $salario->auxilioTransporte=$request->get('auxilioTransporte');
        $salario->auxilioTransporteEspecial=$request->get('auxilioTransporteEspecial');
        $salario->auxilioMedicinaPrepagada=$request->get('auxilioMedicinaPrepagada');
        $salario->fkidUsuario=auth()->user()->id;
        $salario->update();
        
        if(auth()->user()->rol['tipo_Rol'] == 'Administrador' ){
            return Redirect::to('Salarios'); 
        }else{
            return Redirect::to('Salarios/bonificaciones');
        }
             


      
    }
    
    public function export(Request $request){

        $salarioBase=trim($request->get('salarioBase'));
        $bonificacion=trim($request->get('bonificacion'));
        $auxilioTransporte=trim($request->get('auxilioTransporte'));
        $auxilioTransporteEspecial=trim($request->get('auxilioTransporteEspecial'));
        $auxilioMedicinaPrepagada=trim($request->get('auxilioMedicinaPrepagada'));        
        $salario =DB::table('salarios')
        ->join('empleados','fkCedulaEmpleado','=','empleados.cedula')        
        ->select('salarios.id',
                'empleados.nombreEmpleado',
                'salarios.salarioBase',
                'salarios.bonificacion',
                DB::raw('(salarios.salarioBase + salarios.bonificacion) as salario'),
                'salarios.auxilioTransporte',                
                'salarios.auxilioTransporteEspecial',
                'salarios.auxilioMedicinaPrepagada')
        ->get();

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
         $y = $hoy['year'];

        return Excel::download(new SalarioExport($salario), 'Salarios'.$d.$m.$y.'.xlsx');   
    }    
}
