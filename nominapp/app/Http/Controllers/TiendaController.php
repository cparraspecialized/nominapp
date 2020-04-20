<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TiendaFormRequest;
use App\Municipio;
use App\Departamento;
use App\Tienda;
use App\Http\Requests\storeTiendaRequest;
use App\Exports\TiendaExport;
use Carbon\Carbon;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class TiendaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){
        
        if($request){

            $nombreTienda=trim($request->get('nombreTienda'));    
            $tiendas =Tienda::orderBy('created_at','desc')
            ->where('nombreTienda','like','%'.$nombreTienda.'%')
             ->paginate(10);
            return view('Tiendas.index',["nombreTienda"=>$nombreTienda], compact('tiendas'));

        }       
    }

    public function store(storeTiendaRequest $request){

        try {

            DB::BeginTransaction();
            $tienda=new Tienda;
            $tienda->nombreTienda=$request->get('nombreTienda');
            $tienda->fkcodigoMunicipio=$request->get('fkcodigoMunicipio');
            if ($tienda->save()) {
                DB::commit();
                return redirect()->route('Tiendas.index')->with('info','Tienda creada con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear la tienda'.$e);

       }
    }
    
    public function export(Request $request){

        $nombreTienda=trim($request->get('nombreTienda'));
        $tienda =DB::table('tiendas')
        ->leftjoin('municipios','fkcodigoMunicipio','=','municipios.codigoMunicipio')
        ->where('tiendas.nombreTienda','like','%'.$nombreTienda.'%')
        ->select(   'tiendas.nombreTienda',                    
                    'municipios.nombreMunicipio',                    
                )
        ->get();

        $hoy = getdate();

        $d = $hoy['mday'];
        $m = $hoy['mon'];
         $y = $hoy['year'];

        return Excel::download(new TiendaExport($tienda), 'Tiendas'.$d.$m.$y.'.xlsx');   
    }

    public function create(){

        $departamento= Departamento::pluck('nombreDepartamento','codigoDepartamento');

        return view('Tiendas.create',compact('departamento'));

    }
    
    public function byMunicipio($id){

        return Municipio::where('fkcodigoDepartamento','=',$id)
        ->get();

    }

}
