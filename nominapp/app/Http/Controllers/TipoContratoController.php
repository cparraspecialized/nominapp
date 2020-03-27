<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoContrato;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeTipoContratoRequest;
use DB;

class TipoContratoController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('TipoContratos.create');
    }    

    public function index(Request $request){

        $tipocontrato =TipoContrato::orderBy('id','desc')->paginate(10);

        return view('TipoContratos.index', compact('tipocontrato'));
    }

    public function store(storeTipoContratoRequest $request){

        $tipocontrato=new TipoContrato;
        $tipocontrato->descripcionTipoContrato=$request->get('descripcionTipoContrato');
        $tipocontrato->save();

        return Redirect::to('TipoContratos');

    }   
}
