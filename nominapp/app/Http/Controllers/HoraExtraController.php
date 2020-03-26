<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\HoraExtra;
use App\TipoHora;
use App\Empleado;
use DB;

class HoraExtraController extends Controller
{
    public function __construct(){

    }

    public function create(){

        $tipohoras= TipoHora::pluck('descripcionTipo','id');

        $empleados= Empleado::pluck('cedula','cedula');

        return view('HoraExtras.create',compact('empleados','tipohoras'));

        $tipohoras = TipoHora::pluck('descripcionTipo');    

        $empleados = Empleado::pluck('cedula');
        return View('HoraExtras.index', compact('empleados','tipohoras'));

    }

    public function index(Request $request){

        $horasextras = DB::table('hora_extras')->get();

        return view('HoraExtras.index', ['horasextras' => $horasextras]);
    }

    public function store(Request $request){

       
        $horaextr=new HoraExtra;
        $horaextr->fkidTipoHora=$request->get('fkidTipoHora');
        $horaextr->fkcedulaEmpleado=$request->get('fkcedulaEmpleado');        
        $horaextr->horasExtra=$request->get('horasExtra');
        $horaextr->fechaHorasExtra=$request->get('fechaHorasExtra');
        $horaextr->fkidUsuario=auth()->user()->id;        
        $horaextr->save();
        
        return Redirect::to('HoraExtras');      

    }
}
