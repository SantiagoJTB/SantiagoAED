<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FicheroCsvController extends Controller
{
    public function crearFichero(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|email',
        ]);

        // Obtener el nombre y el correo
        $nombre = $request->input('nombre');
        $correo = $request->input('correo');

        // Ruta del fichero CSV
        $rutaDir = storage_path('app/ficheros');
        $rutaCsv = $rutaDir . '/contactos.csv';

        // Verificar si el directorio existe, si no, crearlo
        if (!file_exists($rutaDir)) {
            mkdir($rutaDir, 0755, true); // Crear el directorio
        }

        // Crear o agregar al fichero CSV
        $fichero = fopen($rutaCsv, 'a');

        // Escribir en el fichero
        fputcsv($fichero, [$nombre, $correo]);

        // Cerrar el fichero
        fclose($fichero);

        return redirect()->back()->with('mensaje', 'Contacto añadido correctamente.');
    }

    public function leerFichero()
    {
        $rutaCsv = 'app/ficheros/contactos.csv';  // Ruta dentro de storage/app
        $contenido = [];

        // Verificar si el fichero existe en la ruta de almacenamiento correcta
        if (file_exists(storage_path('app/' . $rutaCsv))) {
            // Abrir el fichero en modo lectura
            $fichero = fopen(storage_path('app/' . $rutaCsv), 'r');

            // Leer cada línea del CSV y agregarla al array
            while (($datos = fgetcsv($fichero)) !== false) {
                $contenido[] = $datos;
            }

            // Cerrar el fichero después de leerlo
            fclose($fichero);
        }

        // Verificar si el contenido está vacío y definir el mensaje
        $mensaje = empty($contenido) ? 'No hay contactos disponibles.' : null;

        // Retornar la vista con los contactos y el mensaje
        return view('listarFicheros', ['contactos' => $contenido, 'mensaje' => $mensaje]);
    }

    public function listarFicheros()
{
    $contactos = [];
    $rutaCsv = storage_path('app/ficheros/contactos.csv');

    if (file_exists($rutaCsv)) {
        $fichero = fopen($rutaCsv, 'r');

        while (($datos = fgetcsv($fichero)) !== false) {
            $contactos[] = $datos;
        }
        fclose($fichero);
    }

    $directorio = storage_path('app/ficheros');
    $archivos = [];
    if (file_exists($directorio)) {
        $archivos = scandir($directorio);
    }

    return view('listarFicheros', [
        'contactos' => $contactos,
        'archivos' => $archivos
    ]);
}


    public function descargarFichero($nombreFichero)
    {
        $rutaFichero = storage_path('app/ficheros/' . $nombreFichero);

        if (file_exists($rutaFichero)) {
            return response()->download($rutaFichero);
        } else {
            return redirect()->back()->with('error', 'El fichero no existe.');
        }
    }

    public function borrarFichero($nombreFichero)
{
    $rutaFichero = storage_path('app/ficheros/' . $nombreFichero);

    if (file_exists($rutaFichero)) {
        unlink($rutaFichero);
        return redirect()->back()->with('mensaje', 'Fichero borrado correctamente.');
    } else {
        return redirect()->back()->with('error', 'El fichero no existe.');
    }
}
}
