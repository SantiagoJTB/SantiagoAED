<?php
namespace App\Models;

use App\Models\Mazo;
use App\Models\Jugador;

class Partida {
    public $jugador;
    public $crupier;
    public $mazo;
    public $ganador;
    private $puntero;

    public function __construct($jugador) {
        $this->jugador = $jugador;
        $this->crupier = new Jugador('Crupier 1');
        $this->mazo = new Mazo();
        $this->ganador = new Jugador(null);
        $this->puntero = 0;
    }

    public function getPuntuacionJugador() {
        return $this->jugador->getMano()->getPuntuacion();
    }

    public function getPuntuacionCrupier() {
        return $this->crupier->getMano()->getPuntuacion();
    }

    // En el método 'darCartas', solo repartimos cartas y verificamos si alguien ha superado 21
// En el método 'darCartas', solo repartimos cartas y verificamos si alguien ha superado 21
public function darCartas() {
    $mazo = $this->mazo->getMazo();
    //CONTADOR DE ASES(si la mano tiene un AS ese AS vale 11, si tiene mas de 1 vale 1) Y LAS CARTAS MAYORES DE 10 VALEN 10

    // JUGADOR
    $cartaJugador = $mazo[$this->puntero];
    $nuevaCartaJugador = $this->jugador->mano->getCartas();
    $nuevaCartaJugador[] = $cartaJugador;
    $this->jugador->mano->setCartas($nuevaCartaJugador);
    $valorManoCrupier = 0;
    $valorManoJugador = $this->calcularPuntuacion($nuevaCartaJugador);
    $this->jugador->getMano()->setPuntuacion($valorManoJugador);
    session()->put('valorManoJugador', $valorManoJugador);

    // Si el jugador se pasa de 21, el crupier gana, si el crupier tiene 21 gana tambien
    if ($valorManoJugador > 21 || $valorManoCrupier == 21) {
        $this->ganador->setNombre($this->crupier->getNombre());
        return;
    }

    $this->puntero++;

    // CRUPIER
    $cartaCrupier = $mazo[$this->puntero];
    $nuevaCartaCrupier = $this->crupier->getMano()->getCartas();
    $nuevaCartaCrupier[] = $cartaCrupier;
    $this->crupier->getMano()->setCartas($nuevaCartaCrupier);

    //AÑADIR SI MANO CRUPIER > 17 NO PEDIR, SI ES MENOR DE 11 PEDIR, SI ES ENTRE 11 A 17 ELECCION ALEATORIA
    $valorManoCrupier = $this->calcularPuntuacion($nuevaCartaCrupier);
    $this->crupier->getMano()->setPuntuacion($valorManoCrupier);
    session()->put('valorManoCrupier', $valorManoCrupier);

    // Si el crupier se pasa de 21, el jugador gana automáticamente
    if ($valorManoCrupier > 21 || $valorManoJugador == 21) {
        $this->ganador->setNombre($this->jugador->getNombre());
    }

    $this->puntero++;
}

// En el método 'elegirGanador', definimos el ganador solo al plantarse
public function elegirGanador() {
    $puntuacionCrupier = $this->getPuntuacionCrupier();
    $puntuacionJugador = $this->getPuntuacionJugador();

    if ($puntuacionJugador > 21) {
        $this->ganador->setNombre($this->crupier->getNombre());
    } elseif ($puntuacionCrupier > 21) {
        $this->ganador->setNombre($this->jugador->getNombre());
    } else {
        if ($puntuacionJugador > $puntuacionCrupier) {
            $this->ganador->setNombre($this->jugador->getNombre());
        } elseif ($puntuacionCrupier > $puntuacionJugador) {
            $this->ganador->setNombre($this->crupier->getNombre());
        } else {
            $this->ganador->setNombre('Empate');
        }
    }
}

    // Función para calcular la puntuación
    public function calcularPuntuacion($mano) {
        $puntuacion = 0;
        foreach ($mano as $carta) {
            $puntuacion += $carta->getValor();
        }
        return $puntuacion;
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

    /**
     * Get the value of crupier
     */
    public function getCrupier()
    {
        return $this->crupier;
    }

    /**
     * Set the value of crupier
     *
     * @return  self
     */
    public function setCrupier($crupier)
    {
        $this->crupier = $crupier;
        return $this;
    }

    /**
     * Get the value of mazo
     */
    public function getMazo()
    {
        return $this->mazo;
    }

    /**
     * Set the value of mazo
     *
     * @return  self
     */
    public function setMazo($mazo)
    {
        $this->mazo = $mazo;
        return $this;
    }

    // Método para obtener el puntero
    public function getPuntero() {
        return $this->puntero;
    }

    // Método para reiniciar el puntero
    public function reiniciarPuntero() {
        $this->puntero = 0;
    }

    /**
     * Get the value of ganador
     */
    public function getGanador()
    {
        return $this->ganador;
    }

    /**
     * Set the value of ganador
     *
     * @return  self
     */
    public function setGanador($ganador)
    {
        $this->ganador = $ganador;

        return $this;
    }
}
