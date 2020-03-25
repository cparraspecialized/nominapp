<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;

use DB;


class TiendaController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

        $tiendas = DB::table('tiendas')->get();

        return view('Tiendas.index', ['tiendas' => $tiendas]);
    }

}
