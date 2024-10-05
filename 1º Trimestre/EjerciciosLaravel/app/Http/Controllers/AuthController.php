<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Vista de inicio de sesión
    }

    public function login(Request $request)
    {
        $request->validate([
            'nick' => 'required|string',
        ]);

        // Guardar el nick en la sesión
        session(['nick' => $request->input('nick')]);

        return redirect()->route('iniciotodo'); // Redirigir a la página de tareas
    }

    public function logout()
    {
        session()->forget('nick'); // Eliminar el nick de la sesión
        return redirect()->route('login'); // Redirigir a la página de inicio de sesión
    }
}
