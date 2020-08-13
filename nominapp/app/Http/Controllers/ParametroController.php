<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametro;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeParametroRequest;
use DB;

class ParametroController extends Controller
{
    public function __construct(){

    }

    public function create(){       
        return view('Parametros.create');
    }

    public function index(Request $request){

        $parametr =Parametro::orderBy('id','desc')->get();    
        return view('Parametros.index', compact('parametr'));
        
    }

    public function editparametro($id){
        return view("Parametros.editparametro",["parametro"=>Parametro::findOrFail($id)]);

    }


    public function update(Request $request, $id){
        $parametr =Parametro::findOrFail($request->id);  
        $parametr->salarioMinimo=$request->get('salarioMinimo');
        $parametr->auxilioTransportes=$request->get('auxilioTransportes');
        $parametr->update();
        return Redirect::to('Parametros');       
    }
}
