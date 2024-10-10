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

    public function elegirGanador() {
        if ($this->getPuntuacionCrupier() > $this->getPuntuacionJugador()
        || $this->getPuntuacionCrupier() > 21) {
            $this->ganador->setNombre($this->crupier->getNombre());
        } elseif ($this->getPuntuacionCrupier() < $this->getPuntuacionJugador()
        || $this->getPuntuacionJugador() > 21) {
            $this->ganador->setNombre($this->jugador->getNombre());
        } else {
            $this->ganador->setNombre(null);
        }
    }

    public function darCartas() {
        $mazo = $this->mazo->getMazo();

        // Carta para el jugador
        $cartaJugador = $mazo[$this->puntero];  // Obtenemos la carta actual
        $nuevaCartaJugador = $this->jugador->mano->getCartas();  // Obtenemos las cartas actuales
        $nuevaCartaJugador[] = $cartaJugador;  // Agregamos la nueva carta
        $this->jugador->mano->setCartas($nuevaCartaJugador);  // Guardamos la nueva mano
        $manoJugador = $this->jugador->mano->getCartas();
        // Calculamos la puntuación del jugador
        $valorManoJugador = 0;
        foreach ($manoJugador as $carta) {
            $valorManoJugador += $carta->getValor();
        }
        $this->jugador->getMano()->setPuntuacion($valorManoJugador);

        $this->elegirGanador();

        $this->puntero++; // Aumentamos el puntero para la próxima carta

        if ($this->puntero < count($mazo)) { // Solo sacar carta si hay cartas disponibles
            $cartaCrupier = $mazo[$this->puntero];
            $manoCrupier = $this->crupier->getMano()->getCartas();
            $manoCrupier[] = $cartaCrupier;
            $this->crupier->getMano()->setCartas($manoCrupier);

            $valorManoCrupier = 0;
            foreach ($manoCrupier as $carta) {
                $valorManoCrupier += $carta->getValor();
            }
            $this->crupier->getMano()->setPuntuacion($valorManoCrupier);

        }

        $this->elegirGanador();

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
