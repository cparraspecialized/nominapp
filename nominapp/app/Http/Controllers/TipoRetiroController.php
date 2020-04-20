<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoRetiro;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeTipoRetiroRequest;
use App\Exports\TipoRetiroExport;
use Carbon\Carbon;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class TipoRetiroController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('TipoRetiros.create');
    }    

    public function index(Request $request){

        if($request){

            $descripcionTipoRetiro=trim($request->get('descripcionTipoRetiro'));
            $tiporetiro =TipoRetiro::orderBy('created_at','desc')
            ->where('descripcionTipoRetiro','like','%'.$descripcionTipoRetiro.'%')            
            ->paginate(8);
            return view('TipoRetiros.index',["descripcionTipoRetiro"=>$descripcionTipoRetiro,"tiporetiro"=>$tiporetiro]);
    
        }
    }

    public function store(storeTipoRetiroRequest $request){

        try {

            DB::BeginTransaction();
            $tiporetiro=new TipoRetiro;
            $tiporetiro->descripcionTipoRetiro=$request->get('descripcionTipoRetiro');        

            if ($tiporetiro->save()) {
                DB::commit();
                return redirect()->route('TipoRetiros.index')->with('info','Tipo Retiro creado con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear el Tipo retiro'.$e);

       }   

    }   

    public function export(Request $request){

        $descripcionTipoRetiro=trim($request->get('descripcionTipoRetiro'));
        $tiporetiro =DB::table('tiporetiro')
        ->get();

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];    
        return Excel::download(new TipoRetiroExport($tiporetiro), 'TipoRetiros'.$d.$m.$y.'.xlsx');
    }   
}
