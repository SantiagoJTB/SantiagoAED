<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoController extends Controller
{
    private $filePath;

    public function __construct()
    {
        $this->filePath = storage_path('tareas.json'); // Ruta del archivo para almacenar las tareas
    }

    public function iniciotodo(Request $request)
    {
        // Comprobar si el usuario ha iniciado sesión
        if (!$request->session()->has('nick')) {
            return redirect()->route('login'); // Redirigir al inicio de sesión si no ha iniciado sesión
        }

        // Cargar las tareas desde el archivo
        $tareas = $this->cargarTareas();

        // Manejar el envío del formulario para crear tareas
        if ($request->isMethod('post') && $request->has(['tarea', 'descripcion'])) {
            $nuevaTarea = [
                'nick' => $request->session()->get('nick'), // Asociar la tarea con el nick del usuario
                'tarea' => $request->input('tarea'),
                'descripcion' => $request->input('descripcion'),
            ];

            // Guardar la nueva tarea en el archivo
            $tareas[] = $nuevaTarea;
            $this->guardarTareas($tareas);

            return redirect()->route('iniciotodo');
        }

        // Manejar la eliminación de tareas
        if ($request->isMethod('post') && $request->has('eliminar')) {
            unset($tareas[$request->input('eliminar')]);
            $tareas = array_values($tareas); // Reindexar
            $this->guardarTareas($tareas); // Guardar cambios en el archivo
            return redirect()->route('iniciotodo');
        }

        // Filtrar las tareas por el nick del usuario
        $tareasFiltradas = array_filter($tareas, function ($tarea) {
            return $tarea['nick'] === session('nick');
        });

        return view('iniciotodo', [
            'tareas' => $tareasFiltradas
        ]);
    }

    private function cargarTareas()
    {
        if (!file_exists($this->filePath)) {
            return []; // Retornar un array vacío si el archivo no existe
        }

        $contenido = file_get_contents($this->filePath);
        return json_decode($contenido, true) ?? []; // Decodificar JSON y retornar como array
    }

    private function guardarTareas(array $tareas)
    {
        file_put_contents($this->filePath, json_encode($tareas, JSON_PRETTY_PRINT)); // Guardar tareas en formato JSON
    }
}
