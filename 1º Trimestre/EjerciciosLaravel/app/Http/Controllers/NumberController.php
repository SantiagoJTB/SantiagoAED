<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function showNumbers()
    {
        // Generar una lista de 20 números aleatorios entre 0 y 100
        $numbers = [];
        for ($i = 0; $i < 20; $i++) {
            $numbers[] = rand(0, 100);
        }

        // Pasar la lista de números a la vista
        return view('numbers', compact('numbers'));
    }
}
