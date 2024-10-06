<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaColoresController extends Controller{

    public function listacolores(Request $request){

        if ($request->isMethod('post') && $request->has('color')) {
            // Obtener el color introducido por el usuario
            $color = $request->input('color');

            // Obtener la lista de colores actual de la sesión
            $colores = session()->get('colores', []);

            // Agregar el nuevo color a la lista
            $colores[] = $color;

            // Guardar la lista actualizada en la sesión
            session()->put('colores', $colores);
        }

        // Obtener la lista de colores actualizada
        $colores = session()->get('colores', []);

        // Retornar la vista con la lista de colores
        return view('listacolores', ['colores' => $colores]);
    }

    // Método para eliminar un color o limpiar la lista de colores
    public function eliminarColores()
    {
        // Limpiar la lista de colores
        session()->forget('colores');

        // Redirigir de nuevo a la página de lista de colores
        return redirect()->route('listacolores');
    }
}
