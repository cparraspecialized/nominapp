<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TiendaFormRequest;
use App\Municipio;
use App\Departamento;
use App\Tienda;

use DB;


class TiendaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

        $tiendas = DB::table('tiendas')->get();

        return view('Tiendas.index', ['tiendas' => $tiendas]);
    }

    public function store(Request $request){

        $tienda=new Tienda;
        $tienda->nombreTienda=$request->get('nombreTienda');
        $tienda->fkcodigoMunicipio=$request->get('fkcodigoMunicipio');
        $tienda->save();

        return Redirect::to('Tiendas');

    }

    public function create(){

        $departamento= Departamento::pluck('nombreDepartamento','codigoDepartamento');

        return view('Tiendas.create',compact('departamento'));

    }

    public function byDepartamento($id){

        return Municipio::where('fkcodigoDepartamento','=',$id)
         ->get();

    }

    public function byMunicipio($id){

        return Municipio::where('fkcodigoDepartamento','=',$id)
        ->get();

    }

}
