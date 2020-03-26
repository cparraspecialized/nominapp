<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Empleado;
use App\Retiro;
use DB;

class RetiroController extends Controller
{
    public function __construct(){

    }

    public function create(){

        $empleados= Empleado::pluck('cedula','cedula');

        return view('Retiros.create',compact('empleados'));
    }

    public function index(Request $request){

        $retiros =Retiro::orderBy('id','desc')->paginate(10);

        return view('Retiros.index', compact('retiros'));
    }

    public function store(Request $request){

        $retiro=new Retiro;
        $retiro->fkcedulaEmpleado=$request->get('fkcedulaEmpleado');
        $retiro->descripcionIngreso=$request->get('descripcionIngreso');
        $retiro->fechaRetiro=$request->get('fechaRetiro');
        $retiro->fkidUsuario= auth()->user()->id;
        $retiro->save();

        return Redirect::to('Retiros');

    }
}
