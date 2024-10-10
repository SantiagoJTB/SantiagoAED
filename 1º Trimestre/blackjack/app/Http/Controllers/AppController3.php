<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartas;
use App\Models\Partida;
use App\Models\Jugador;
use App\Models\Mano;
use App\Models\Mazo;

class AppController extends Controller
{
    public function inicio()
    {
        return view('welcome');
    }

    public function comienzoSesion(Request $request)
    {
        if ($request->has('nombreJugador')) {
            $jugador = new Jugador($request->input('nombreJugador'));
            $partida = new Partida($jugador->getNombre());
            session(['partida' => $partida]);
            session(['nombreJugador' => $jugador->getNombre()]); // Guardar el nombre del jugador
            session(['manoJugador' => []]); // Inicializar la mano del jugador
            session(['manoCrupier' => []]); // Inicializar la mano del crupier

            return view('partida', [
                'nombreJugador' => $jugador->getNombre(),
                'manoJugador' => session('manoJugador'),
                'manoCrupier' => session('manoCrupier'),
            ]);
    }
}

    public function darCarta(Request $request)
    {
        $partida = session('partida');

        // Obtener la mano del jugador y del crupier desde la sesión
        $manoJugador = session('manoJugador', new Mano());
        $manoCrupier = session('manoCrupier', new Mano());

        if ($request->has('pedirCarta')) {
            $resultado = $partida->darCarta(); // Llama al método darCarta de la partida

            // Actualiza las manos en la sesión
            session(['manoJugador' => $resultado['data']['manoJugador']]);
            session(['manoCrupier' => $resultado['data']['manoCrupier']]);

            return view($resultado['partida'], [
                'manoJugador' => $resultado['data']['manoJugador'],
                'manoCrupier' => $resultado['data']['manoCrupier'],
                'nombreJugador' => session('nombreJugador'),
                'mensaje' => $resultado['data']['mensaje'] ?? null,
                'ganador' => $resultado['data']['ganador'] ?? null,
            ]);
        } elseif ($request->has('plantarse')) {
            // Aquí puedes implementar la lógica al plantarse
            return view('partida', [
                'manoJugador' => $manoJugador,
                'manoCrupier' => $manoCrupier,
                'nombreJugador' => session('nombreJugador'),
            ]);
        }

        // Redirigir a la vista de partida por defecto en caso de que no se cumpla ninguna condición
        return view('partida', [
            'manoJugador' => $manoJugador,
            'manoCrupier' => $manoCrupier,
            'nombreJugador' => session('nombreJugador'),
        ]);
    }
}

?>
