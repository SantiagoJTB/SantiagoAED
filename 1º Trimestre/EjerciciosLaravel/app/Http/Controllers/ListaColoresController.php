<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaColoresController extends Controller{

    public function listacolores(Request $request){

        if ($request->isMethod('post') && $request->has('color')) {
            $color = $request->input('color');

            $colores = session()->get('colores', []);


            $colores[] = $color;

            session()->put('colores', $colores);
        }

        $colores = session()->get('colores', []);

        return view('listacolores', ['colores' => $colores]);
    }
    public function eliminarColores()
    {
        session()->forget('colores');

        return redirect()->route('listacolores');
    }
}
