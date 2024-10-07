<?php
namespace App\Models;

use App\Models\Mazo;
use App\Models\Jugador;

class Partida{

    public $jugador;
    public $mazo;

    public function __construct() {
        $this->mazo = new Mazo();
        $this->jugador = new Jugador();
    }

}
