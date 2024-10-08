<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartas;
use App\Models\Partida;
use Illuminate\Support\Facades\Route;

class AppController extends Controller
{
    public function inicio(){
        return view('welcome');
    }


    public function pedirCarta(){
        $partida = session()->get('partida')??new Partida();
        $carta = $partida->pedirCarta();

        session()->put('partida', $partida);
        return view()

    }

}
