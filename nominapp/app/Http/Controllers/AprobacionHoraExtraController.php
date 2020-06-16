<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\HoraExtra;
use App\TipoHora;
use DB;
use Exception;
use Carbon\Carbon;

class AprobacionHoraExtraController extends Controller
{
    public function index(Request $request){

        $horasextras =HoraExtra::where('validacionHora','=','0')->orderBy('created_at','desc')->paginate(8);
            
        return view('AprobacionesHorasExtras.index',["horasextras"=>$horasextras]);
    }   

    public function statushora($id){
        $tipohoras= TipoHora::pluck('descripcionTipo','id');
        return view("AprobacionesHorasExtras.changestatushora",["horasextras"=>HoraExtra::findOrFail($id)],compact('tipohoras'));
    }

    public function changestatushora(Request $request){
        $horasextras =HoraExtra::where('id', $request->get('id'))->first();

        if($horasextras->validacionHora=='0'){
            $horasextras->fkidTipoHora=$request->get('fkidTipoHora');
            $horasextras->horasExtra=$request->get('horasExtra');
            $horasextras->fechaHorasExtra=$request->get('fechaHorasExtra');
            $horasextras->observacionHoraExtra=$request->get('observacionHoraExtra');
            $horasextras->validacionHora=('1'); 
            $horasextras->update();
            return Redirect::to('AprobacionesHorasExtras'); 

        }
    }
}
