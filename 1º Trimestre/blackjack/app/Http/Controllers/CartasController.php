<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartas;
use Illuminate\Support\Facades\Route;

class CartasController extends Controller
{
    public $mazo = [];

    public function generarCartas()
    {
        $tipos = ['T', 'D', 'C', 'P'];

        for ($i = 1; $i <= 13; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $carta = new Cartas($i, $tipos[$j]);
                $this->mazo[] = $carta;
            }
        }

        shuffle($this->mazo);

        return view('welcome', ['mazo' => $this->mazo]);
    }
}
