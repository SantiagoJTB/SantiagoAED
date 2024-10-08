<?php
namespace App\Models;

use App\Models\Mazo;
use App\Models\Jugador;

class Partida{

    public $jugador;
    public $crupier;
    public $mazo;

    public function __construct($nombreJugador = "") {
        $this->jugador = new Jugador($nombreJugador);
        $this->crupier = new Jugador('Crupier 1');
        $this->mazo = new Mazo();
    }

    public function agregarPuntuacion(){

    }

}
