<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectorioController extends Controller{
    public function crearDirectorio(Request $request){
        $nombreDirectorio = $_POST['nombre'];
        Storage::makeDirectory('/'.$nombreDirectorio, 0755, true);
    }


}
