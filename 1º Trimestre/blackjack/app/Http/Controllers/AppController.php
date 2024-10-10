<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\Mazo;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Types\Relations\Part;

class AppController extends Controller{
    public function inicioPartida(Request $request){
        if($request->filled('nombreJugador')){
            $nombreJugador = $request->input('nombreJugador');
            $jugador = new Jugador($nombreJugador);
            $partida = new Partida($jugador);
            session()->put('partida', $partida);
        }
        $partida = session()->get('partida');

        return view('partida', [
            'partida' => $partida,
            'cartasJugador' => "",
            'cartasCrupier' => "",
            'mensaje' => ""
    ]);
    }

    public function eleccionJugador(Request $request) {
        $partida = session()->get('partida');

        if($request->input('action')==='pedirCarta'){
            $partida->darCartas();
        } elseif($request->input('action')==='plantarse'){
            $partida->elegirGanador();
        } elseif($request->input('action')==='reiniciar'){
            session()->forget('mensaje');
            return view('inicio');
        }

        // Guardar las cartas y el ganador en la sesión
        session()->put('cartasJugador', $partida->jugador->mano->getCartas());
        session()->put('cartasCrupier', $partida->crupier->mano->getCartas());
        session()->put('ganador', $partida->getGanador());

        $mensaje = 'GANADOR: '.$partida->ganador->getNombre();
        session()->put('mensaje', $mensaje);

        return view('partida', [
            'partida' => $partida,
            'mensaje' => $mensaje
        ]);
    }

}


