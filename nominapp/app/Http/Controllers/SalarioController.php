<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SalarioFormRequest;
use App\Salario;
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

        $empleados= Empleado::pluck('nombreEmpleado','cedula');
        return view('Salarios.create',compact('empleados'));

    } 

    public function index(Request $request){

        $empleados= Empleado::pluck('nombreEmpleado','cedula');
        $salario =Salario::orderBy('id','desc')     
        ->paginate(8);

        return view('Salarios.index', compact('salario','empleados'));       
    }

    public function store(Request $request){

        try {

            DB::BeginTransaction();
            $salario=new Salario;
            $salario->fkCedulaEmpleado=$request->get('fkCedulaEmpleado');
            $salario->salarioBase=$request->get('salarioBase');
            $salario->bonificacion=$request->get('bonificacion');
            $salario->auxilioTransporte=$request->get('auxilioTransporte');
            $salario->auxilioCapacitacion=$request->get('auxilioCapacitacion');
            $salario->auxilioComunicacion=$request->get('auxilioComunicacion');
            $salario->gastoRepresentacion=$request->get('gastoRepresentacion');
            $salario->auxilioMedicinaPrepagada=$request->get('auxilioMedicinaPrepagada');
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
    
    public function export(Request $request){

        $salarioBase=trim($request->get('salarioBase'));
        $bonificacion=trim($request->get('bonificacion'));
        $auxilioTransporte=trim($request->get('auxilioTransporte'));
        $auxilioCapacitacion=trim($request->get('auxilioCapacitacion'));
        $auxilioComunicacion=trim($request->get('auxilioComunicacion'));        
        $gastoRepresentante=trim($request->get('gastoRepresentante'));
        $auxilioMedicinaPrepagada=trim($request->get('auxilioMedicinaPrepagada'));
        $salario =DB::table('salarios')
        ->join('empleados','fkCedulaEmpleado','=','empleados.cedula')
        ->get();

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
         $y = $hoy['year'];

        return Excel::download(new SalarioExport($salario), 'Salarios'.$d.$m.$y.'.xlsx');   
    }    
}
