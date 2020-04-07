<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;

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

}
