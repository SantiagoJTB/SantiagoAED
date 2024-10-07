<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class DirectorioController extends Controller
{

    public function crearDirectorio(Request $request){
        $nombreusuario = $_POST['nombre'];
        //Storage::makeDirectory("/".$nombreusuario , 0755, true);


        }

}



