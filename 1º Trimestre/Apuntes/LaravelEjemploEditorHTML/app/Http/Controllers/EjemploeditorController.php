<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EjemploeditorController extends Controller
{
    private $nombreficheroejemplo="ejemplo.txt";

    public function ejemploeditorpost(Request $request){

               
        $contenido = $request->contenido;
        
        Storage::put($this->nombreficheroejemplo,$contenido);
        echo "se ha grabado en el fichero: ". $this->nombreficheroejemplo;
    }

    public function ejemploeditorget(){
        
        $contenido = Storage::get($this->nombreficheroejemplo)??"$this->nombreficheroejemplo está vacío";
        
        
        return view('ejemploeditor',compact('contenido'));
        
       
       
    }


}
