<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Tienda;
use App\Rol;
use Exception;
use DB;

class UserController extends Controller
{

    public function show()
    {
        $users= User::orderBy('id','DESC')->paginate(5);
        return view('Users.index',compact('users'));

    }


    public function index()
    {

        $users= User::orderBy('id','DESC')->paginate(5);
        return view('Users.index',compact('users'));

    }

    public function edit($id){

        $tiendas= Tienda::pluck('nombreTienda','id');
        $rol= Rol::pluck('tipo_Rol','id');
        
     
        return view("Users.edit",["users"=>User::findOrFail($id)],compact('tiendas','rol'));

    }   

    public function update(Request $request, $id){

        $users =User::findOrFail($id);
        
            $users =User::findOrFail($id);
            $users->name=$request->get('name');
            $users->email=$request->get('email');
            $users->fkidTienda=$request->get('fkidTienda');
            $users->fkidRol=$request->get('fkidRol');            
            $users->update();
       
        
        return Redirect::to('Users'); 


      
    }

}
