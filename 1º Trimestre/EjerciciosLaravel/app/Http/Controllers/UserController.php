<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mostrarFormulario(Request $request)
    {
        // Obtener datos del usuario almacenados en la sesión, o inicializar con valores vacíos
        $usuario = $request->session()->get('usuario', [
            'nombre' => '',
            'edad' => '',
            'gustos' => '',
        ]);

        return view('usuario', ['usuario' => $usuario]);
    }

    public function procesarFormulario(Request $request)
    {
        // Validar los datos enviados
        $datosValidados = $request->validate([
            'nombre' => 'nullable|string|max:255',
            'edad' => 'nullable|integer|min:0',
            'gustos' => 'nullable|string|max:255',
        ]);

        // Obtener datos anteriores de la sesión
        $usuario = $request->session()->get('usuario', [
            'nombre' => '',
            'edad' => '',
            'gustos' => '',
        ]);

        // Actualizar solo los campos que se han rellenado
        $usuario['nombre'] = !empty($datosValidados['nombre']) ? $datosValidados['nombre'] : $usuario['nombre'];
        $usuario['edad'] = !empty($datosValidados['edad']) ? $datosValidados['edad'] : $usuario['edad'];
        $usuario['gustos'] = !empty($datosValidados['gustos']) ? $datosValidados['gustos'] : $usuario['gustos'];

        // Guardar los datos actualizados en la sesión
        $request->session()->put('usuario', $usuario);

        // Redirigir nuevamente al formulario
        return redirect()->route('usuario.mostrarFormulario');
    }
}
