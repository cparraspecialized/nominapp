<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\TipoHora;
use DB;

class TipoHoraController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('TipoHoras.create');
    }    

    public function index(Request $request){

        $tipohoras =TipoHora::orderBy('id','desc')->paginate(10);

        return view('TipoHoras.index', compact('tipohoras'));
    }

    public function store(Request $request){

        $tipohora=new TipoHora;
        $tipohora->descripcionTipo=$request->get('descripcionTipo');
        $tipohora->save();

        return Redirect::to('TipoHoras');

    }   

}
