<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Empleado;
use Carbon\Carbon;
use Exception;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $presupuestada =Empleado::orderBy('created_at','desc')
        ->Where('empleados.tipoPosicion','=','Presupuestada')->count();
        $extra =Empleado::orderBy('created_at','desc')
        ->Where('empleados.tipoPosicion','=','extra')->count();
        return view('home',["presupuestada"=>$presupuestada,"extra"=>$extra]);
    }
}
