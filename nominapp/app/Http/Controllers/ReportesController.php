<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Empleado;
use Carbon\Carbon;
use Exception;
use DB;

class ReportesController extends Controller
{
    public function index(Request $request){
        $empleados =Empleado::orderBy('created_at','desc')->count();
        return view('home',["empleados"=>$empleados]);
    }
}
