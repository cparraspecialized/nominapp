<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoNovedad;
use App\Http\Requests\storeTipoNovedadRequest;
use App\Exports\TipoNovedadExport;
use Carbon\Carbon;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class TipoNovedadController extends Controller
{
    public function __construct(){

    }

    public function create(){

        return View('TipoNovedad.create');

    }

    public function index(Request $request){

        if($request){

            $descripcionTipoNovedad=trim($request->get('descripcionTipoNovedad'));
            $tiponovedad =TipoNovedad::orderBy('created_at','desc')
            ->where('descripcionTipoNovedad','like','%'.$descripcionTipoNovedad.'%')            
            ->paginate(8);
            return view('TipoNovedad.index',["descripcionTipoNovedad"=>$descripcionTipoNovedad,"tiponovedad"=>$tiponovedad]);
    
        }
    }

    public function store(storeTipoNovedadRequest $request){

        try {

            DB::BeginTransaction();
            $tiponovedad=new TipoNovedad;
            $tiponovedad->descripcionTipoNovedad=$request->get('descripcionTipoNovedad');        

            if ($tiponovedad->save()) {
                DB::commit();
                return redirect()->route('TipoNovedad.index')->with('info','Tipo novedad creado con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear el Tipo novedad'.$e);

       }
        

    }

    public function export(Request $request){

        $descripcionTipoNovedad=trim($request->get('descripcionTipoNovedad'));
        $tiponovedad =DB::table('tiponovedad')
        ->get();

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];    
        return Excel::download(new TipoNovedadExport($tiponovedad), 'TipoNovedad'.$d.$m.$y.'.xlsx');
    }
}
