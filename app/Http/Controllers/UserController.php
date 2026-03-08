<?php

namespace App\Http\UserControllers;
use Illuminate\Http\Request;
use App\Models\Test;


// class UserController extends Controller{

// }


class UserController extends Controller 
{
    public function index()

    {
        $test = new Test();
        $oef = $test->oef;
        $name = 'John Doe';
        return view('user', compact('name', 'oef'));
    }
}