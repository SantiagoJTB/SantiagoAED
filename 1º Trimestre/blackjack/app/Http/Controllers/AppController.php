<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartas;
use App\Models\Partida;
use Illuminate\Support\Facades\Route;
use App\Models\Jugador;
use App\Models\Mano;
use App\Models\Mazo;
use Illuminate\Contracts\Session\Session;
use PHPUnit\TextUI\XmlConfiguration\Logging\Junit;

class AppController extends Controller
{
    public function inicio(){
        return view('welcome');
    }

 public function comienzoSesion(Request $request) {
    if ($request->has('nombreJugador')) {
        $jugador = new Jugador($request->input('nombreJugador'));
        $crupier = new Jugador('Crupier');
        $mazo = new Mazo();
        $partida = new Partida($jugador, $crupier, $mazo);
        session(['partida' => $partida]);
        session(['nombreJugador' => $jugador->getNombre()]); // Asegúrate de guardar el nombre del jugador aquí
        return view('partida', ['nombreJugador' => $jugador->getNombre()]);
    } else {
        $error = 'Introduce un nombre de jugador.';
        return view('welcome', compact('error'));
    }
}
    public function darCarta($aux, Request $request){
        $partida = session('partida');
        $mazo = $partida->getMazo();
        $jugador = $partida->getJugador();
        $crupier = $partida->getCrupier();

        $manoJugador = session('manoJugador', new Mano());
        $manoCrupier = session('manoCrupier', new Mano());

            if($request->has('pedirCarta')){
                $manoJugador = [$mazo[$aux]];
                session(['manoJugador'=>$manoJugador]);
                $aux++;
                $manoCrupier = [$mazo[$aux]];
                session(['manoCrupier'=>$manoCrupier]);

                //COMPROBAR QUE VALOR DE MANO < 21 IF END

                return view('partida', [
                    'manoJugador' => $manoJugador,
                    'manoCrupier' => $manoCrupier
                ]);

            }else if($request->has('plantarse')){
                $manoFinalJugador = $manoJugador;
                $manoFinalCrupier = $manoCrupier;

                //HACER LA COMPARACION

    }

}

}
