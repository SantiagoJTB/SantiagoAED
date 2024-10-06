<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioCSVController extends Controller
{
    // Crear un archivo CSV y almacenarlo en Storage
    public function crearCSV()
    {
        $datos = [
            ['nombre' => 'Santiago Torres', 'email' => 'santitorres@example.com'],
            ['nombre' => 'Ana Pérez', 'email' => 'anaperez@example.com'],
            ['nombre' => 'Carlos García', 'email' => 'carlosgarcia@example.com']
        ];

        // Abrir el archivo CSV para escribirlo
        $csv = fopen(storage_path('app/usuarios.csv'), 'w');

        // Escribir la cabecera del archivo CSV
        fputcsv($csv, ['Nombre', 'Correo']);

        // Escribir cada fila de datos en el archivo CSV
        foreach ($datos as $fila) {
            fputcsv($csv, $fila);
        }

        // Cerrar el archivo
        fclose($csv);

        return "Archivo CSV creado en 'storage/app/usuarios.csv'.";
    }

    // Leer el archivo CSV y mostrar su contenido en pantalla
    public function leerCSV()
    {
        $rutaArchivo = storage_path('app/usuarios.csv');

        // Verificar si el archivo existe
        if (!file_exists($rutaArchivo)) {
            return "El archivo CSV no existe.";
        }

        // Leer el archivo CSV
        $archivo = fopen($rutaArchivo, 'r');
        $contenido = [];

        // Leer cada línea del archivo y agregarla al contenido
        while (($datos = fgetcsv($archivo)) !== false) {
            $contenido[] = $datos;
        }

        // Cerrar el archivo
        fclose($archivo);

        // Devolver la vista con los datos leídos
        return view('mostrarCSV', ['contenido' => $contenido]);
    }
}
