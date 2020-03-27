<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoRetiro;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeTipoRetiroRequest;
use DB;


class TipoRetiroController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('TipoRetiros.create');
    }    

    public function index(Request $request){

        $tiporetiro =TipoRetiro::orderBy('id','desc')->paginate(10);

        return view('TipoRetiros.index', compact('tiporetiro'));
    }

    public function store(storeTipoRetiroRequest $request){

        $tiporetiro=new TipoRetiro;
        $tiporetiro->descripcionTipoRetiro=$request->get('descripcionTipoRetiro');
        $tiporetiro->save();

        return Redirect::to('TipoRetiros');

    }   
}
