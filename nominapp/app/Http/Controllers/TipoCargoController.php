<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCargo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeTipoCargoRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TipoCargoExport;
use Carbon\Carbon;
use Exception;
use DB;

class TipoCargoController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('TipoCargos.create');
    }    

    public function index(Request $request){
        if($request){

            $descripcionTipoCargo=trim($request->get('descripcionTipoCargo'));
            $tipocargo =TipoCargo::orderBy('created_at','desc')
            ->where('descripcionTipoCargo','like','%'.$descripcionTipoCargo.'%')            
            ->paginate(8);
            return view('TipoCargos.index',["descripcionTipoCargo"=>$descripcionTipoCargo,"tipocargo"=>$tipocargo]);
    
        }
    }

    public function store(storeTipoCargoRequest $request){
        try {

            DB::BeginTransaction();
            $tipocargo=new TipoCargo;
            $tipocargo->descripcionTipoCargo=$request->get('descripcionTipoCargo');        

            if ($tipocargo->save()) {
                DB::commit();
                return redirect()->route('TipoCargos.index')->with('info','Tipo Cargo creado con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear el Tipo de Cargo'.$e);

       }   

    }
    
    public function export(Request $request){

        $descripcionTipoCargo=trim($request->get('descripcionTipoCargo'));
        $tipocargo =DB::table('tipocargo')
        ->get();

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];    
        return Excel::download(new TipoCargoExport($tipocargo), 'TipoCargos'.$d.$m.$y.'.xlsx');
    }
}
