<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class EmpleadoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $clientes=DB::table('cliente as c')
            ->join('municipio as m','c.fkidMunicipio','=','m.mun_codigo')
            ->select('c.idCliente','c.TipoDocumentoCliente','c.DocumentoCliente','c.NombreCliente',
            'c.ApellidoCliente','c.DireccionCliente','m.mun_nombre as municipio','c.CorreoCliente','c.TelefonoCliente')
            ->where('c.DocumentoCliente','LIKE','%'.$query.'%')
            ->orWhere('c.NombreCliente','LIKE','%'.$query.'%')
            ->orWhere('c.ApellidoCliente','LIKE','%'.$query.'%')
            ->orderBy('c.created_at','desc')
            ->paginate(7);
            return view('bicicleta.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }

}
