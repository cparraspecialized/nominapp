<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoNovedad;
use DB;


class TipoNovedadController extends Controller
{
    public function __construct(){

    }

    public function create(){

        return View('TipoNovedad.create');

    }

    public function index(Request $request){

        $tiponovedad = DB::table('tipo_novedades')->get();

        return view('TipoNovedad.index', ['tiponovedad' => $tiponovedad]);
    }

    public function store(Request $request){

       
        $tiponovedad=new TipoNovedad;
        $tiponovedad->descripcionTipoNovedad=$request->get('descripcionTipoNovedad');
        $tiponovedad->save();
        
        return Redirect::to('TipoNovedad');
        

    }
}
