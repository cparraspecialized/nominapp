<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\TipoNovedad;
use App\Novedad;
use Carbon\Carbon;
use Exception;
use DB;

class AprobacionNovedadController extends Controller
{
    
    public function index(Request $request){

        $novedades = Novedad::where('validacionNovedad','0')->orderBy('id','desc')->get();
            
        return view('AprobacionesNovedades.index',["novedades"=>$novedades]);
    }

    public function statusnovedad($id){
        $tnovedades= TipoNovedad::pluck('descripcionTipoNovedad','id');
        return view("AprobacionesNovedades.changestatusnovedad",["novedad"=>Novedad::findOrFail($id)],compact('tnovedades'));
    }

    public function changestatusnovedad(Request $request){
       
        $novedades = Novedad::where('id', $request->get('id'))->first();
        if($novedades->validacionNovedad =='0'){
            $novedades->fktipoNovedad=$request->get('fktipoNovedad');
            $novedades->fechaNovedad=$request->get('fechaNovedad');
            $novedades->fechaFinNovedad=$request->get('fechaFinNovedad');
            $novedades->observacionNovedad=$request->get('observacionNovedad');
            $novedades->validacionNovedad = '1'; 
            $novedades->update();            
            return Redirect::to('Novedades'); 
        }
        return Redirect::to('AprobacionNovedades'); 
    }
}
