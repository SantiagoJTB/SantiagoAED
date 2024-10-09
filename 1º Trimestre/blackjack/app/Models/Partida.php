<?php
namespace App\Models;

use App\Models\Mazo;
use App\Models\Jugador;
use Illuminate\Types\Relations\Part;

class Partida{

    public $jugador;
    public $crupier;
    public $mazo;

    public function __construct($nombreJugador = "") {
        $this->jugador = new Jugador($nombreJugador);
        $this->crupier = new Jugador('Crupier 1');
        $this->mazo = new Mazo();
    }



    /**
     * Get the value of jugador
     */
    public function getJugador()
    {
        return $this->jugador;
    }

    /**
     * Set the value of jugador
     *
     * @return  self
     */
    public function setJugador($jugador)
    {
        $this->jugador = $jugador;

        return $this;
    }
}