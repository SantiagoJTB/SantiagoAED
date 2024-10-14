<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  FicheroController extends Controller{
    public function crearDirectorio(Request $request)
    {
        if ($request->has('nombre')) {
            $nombre = $request->input('nombre');
            $rutaDir = storage_path($nombre);

            if (!file_exists($rutaDir)) {
                mkdir($rutaDir, 0755, true);
                }
            }
            return view('ejercicio17');

        }

}
