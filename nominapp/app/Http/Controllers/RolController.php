<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\storeRolRequest;
use DB;

class RolController extends Controller
{
    public function __construct(){

    }
    public function create(){       
        return view('Rol.create');
    }    

    public function index(Request $request){

        $rol =Rol::orderBy('id','desc')->paginate(8);

        return view('Rol.index', compact('rol'));
        
    }

    public function store(storeRolRequest $request){

        try {

            DB::BeginTransaction();
            $rol=new Rol;
            $rol->tipo_Rol=$request->get('tipo_Rol');        

            if ($rol->save()) {
                DB::commit();
                return redirect()->route('Rol.index')->with('info','Rol creado con exito'); 
            }

       } catch (Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return back()->with('error', 'Error al crear el Rol'.$e);

       }   

    }       
}
