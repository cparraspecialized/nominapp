<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoNovedad;
use App\Novedad;
use App\Empleado;
use DB;

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

        $novedades = DB::table('novedades')->get();

        return view('Novedades.index', ['novedades' => $novedades]);
    }

    public function store(Request $request){

       
        $novedad=new Novedad;
        $novedad->fkcedulaEmpleado=$request->get('fkcedulaEmpleado');
        $novedad->fechaNovedad=$request->get('fechaNovedad');
        $novedad->fkidUsuario==auth()->user()->id;
        $novedad->fktipoNovedad=$request->get('fktipoNovedad');
        $novedad->save();
        
        return Redirect::to('Novedades');
        

    }

}
