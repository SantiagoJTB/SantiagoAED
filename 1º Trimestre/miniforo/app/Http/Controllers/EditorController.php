<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
    private $nombreficheroejemplo = "ejemplo.txt";


    public function editorpost(Request $request){

        $nombreIntroducido = session('nombre') ?? 'default_user';
        $nombreFichero = $request->input('nombreFichero');
        $contenido = $request->contenido;

        $folderName = pathinfo($nombreFichero, PATHINFO_FILENAME);

        $userFolderPath = storage_path('app/private/' . $nombreIntroducido);
        $folderPath = $userFolderPath . '/' . $folderName;

        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $timestamp = date('Y-m-d_H-i-s');
        $newFilename = $folderName . '_' . $timestamp . '.txt';

        $filePath = $folderPath . '/' . $newFilename;
        file_put_contents($filePath, $contenido);

        return view('directorio');
    }
        public function editorget()
    {
        $contenido = Storage::get($this->nombreficheroejemplo) ?? "$this->nombreficheroejemplo está vacío";

        return view('editor', compact('contenido'));
    }
}
