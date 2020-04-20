<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoContrato;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeTipoContratoRequest;
use App\Exports\TipoContratoExport;
use Carbon\Carbon;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class TipoContratoController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('TipoContratos.create');
    }    

    public function index(Request $request){

        if($request){

            $descripcionTipoContrato=trim($request->get('descripcionTipoContrato'));
            $tipocontrato =TipoContrato::orderBy('created_at','desc')
            ->where('descripcionTipoContrato','like','%'.$descripcionTipoContrato.'%')            
            ->paginate(8);
            return view('TipoContratos.index',["descripcionTipoContrato"=>$descripcionTipoContrato,"tipocontrato"=>$tipocontrato]);
    
        }

        $tipocontrato =TipoContrato::orderBy('id','desc')->paginate(10);

        return view('TipoContratos.index', compact('tipocontrato'));
    }

    public function store(storeTipoContratoRequest $request){

        try {

            DB::BeginTransaction();
            $tipocontrato=new TipoContrato;
            $tipocontrato->descripcionTipoContrato=$request->get('descripcionTipoContrato');        

            if ($tipocontrato->save()) {
                DB::commit();
                return redirect()->route('TipoContratos.index')->with('info','Tipo Contrato creado con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear el Tipo contrato'.$e);

       }   

    }   

    public function export(Request $request){

        $descripcionTipoContrato=trim($request->get('descripcionTipoContrato'));
        $tipocontrato =DB::table('tipocontrato')
        ->get();

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];    
        return Excel::download(new TipoContratoExport($tiporetiro), 'TipoContratos'.$d.$m.$y.'.xlsx');
    }
}
