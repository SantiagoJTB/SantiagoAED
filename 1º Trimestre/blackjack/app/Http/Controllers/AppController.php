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
    ]);
    }

    public function eleccionJugador(Request $request) {
        $partida = session()->get('partida');

        if($request->input('action')==='pedirCarta'){
            $partida->darCartas();
            $partida->elegirGanador();
        }elseif($request->input('action')==='plantarse'){
            $partida->elegirGanador();
        }
        $cartasJugador[] = $partida->jugador->mano->getCartas();
        $cartasCrupier[] = $partida->crupier->mano->getCartas();
        session()->put('cartasJugador',$cartasJugador);
        session()->put('cartasCrupier',$cartasCrupier);

        $ganador = $partida->getGanador();

        session()->put('ganador', $ganador);

        if($partida->ganador->getNombre() !== null){
            return view('inicio', [
                'partida' => session()->get('partida'),
                'ganador' => $ganador
            ]);
        }else{
            return view('partida', [
                'partida' => $partida,
                'cartasJugador' => $cartasJugador,
                'cartasCrupier' => $cartasCrupier
            ]);
        }
}

}
