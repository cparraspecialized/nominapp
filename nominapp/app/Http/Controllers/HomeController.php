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
        $Fija =Empleado::orderBy('created_at','desc')
        ->Where('empleados.tipoPosicion','=','Fija')->count();
        $Temporal =Empleado::orderBy('created_at','desc')
        ->Where('empleados.tipoPosicion','=','Temporal')->count();
        return view('home',["Fija"=>$Fija,"Temporal"=>$Temporal]);
    }
}
