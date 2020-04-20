<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\TipoHora;
use App\Exports\TipoHoraExport;
use App\Http\Requests\storeTipoHoraRequest;
use Carbon\Carbon;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class TipoHoraController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('TipoHoras.create');
    }    

    public function index(Request $request){

        if($request){

            $descripcionTipo=trim($request->get('descripcionTipo'));
            $tipohoras =TipoHora::orderBy('created_at','desc')
            ->where('descripcionTipo','like','%'.$descripcionTipo.'%')            
            ->paginate(8);
            return view('TipoHoras.index',["descripcionTipo"=>$descripcionTipo,"tipohoras"=>$tipohoras]);
    
        }     
    }      

    public function store(storeTipoHoraRequest $request){

        try {

            DB::BeginTransaction();
            $tipohora=new TipoHora;
            $tipohora->descripcionTipo=$request->get('descripcionTipo');        

            if ($tipohora->save()) {
                DB::commit();
                return redirect()->route('TipoHoras.index')->with('info','Tipo Hora creado con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear el Tipo Hora'.$e);

       }

    }   

    public function export(Request $request){

        $descripcionTipo=trim($request->get('descripcionTipo'));
        $tipohoras =DB::table('tipohoras')
        ->get();

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];    
        return Excel::download(new TipoHoraExport($tipohoras), 'TipoHoras'.$d.$m.$y.'.xlsx');
    }   

}
