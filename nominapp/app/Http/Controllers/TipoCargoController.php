<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCargo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeTipoCargoRequest;
use DB;

class TipoCargoController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('TipoCargos.create');
    }    

    public function index(Request $request){

        $tipocargo =TipoCargo::orderBy('id','desc')->paginate(10);

        return view('TipoCargos.index', compact('tipocargo'));
    }

    public function store(storeTipoCargoRequest $request){

        $tipocargo=new TipoCargo;
        $tipocargo->descripcionTipoCargo=$request->get('descripcionTipoCargo');
        $tipocargo->save();

        return Redirect::to('TipoCargos');

    }   
}
