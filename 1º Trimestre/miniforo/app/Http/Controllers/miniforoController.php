<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miniforoController extends Controller
{
    public function login(){
        return view('login');
    }

    public function inicio(){
        return view('inicio');

    }

}
