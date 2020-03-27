<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
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

        $novedades =Novedad::orderBy('id','desc')->paginate(10);

        return view('Novedades.index', compact('novedades'));
    }

    public function store(Request $request){

       
        $novedad=new Novedad;
        $novedad->fkcedulaEmpleado=$request->get('fkcedulaEmpleado');
        $novedad->fechaNovedad=$request->get('fechaNovedad');
        $novedad->fkidUsuario=auth()->user()->id;
        $novedad->fktipoNovedad=$request->get('fktipoNovedad');
        $novedad->save();
        
        return Redirect::to('Novedades');
        

    }

}
