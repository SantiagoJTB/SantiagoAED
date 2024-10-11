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

    public function darCartas() {
        $mazo = $this->mazo->getMazo();

        // JUGADOR
        $cartaJugador = $mazo[$this->puntero];
        $nuevaCartaJugador = $this->jugador->mano->getCartas();
        $nuevaCartaJugador[] = $cartaJugador;
        $this->jugador->mano->setCartas($nuevaCartaJugador);
        $valorManoJugador = $this->calcularPuntuacion($nuevaCartaJugador);
        $this->jugador->getMano()->setPuntuacion($valorManoJugador);
        session()->put('valorManoJugador', $valorManoJugador);

        if ($valorManoJugador > 21) {
            $this->ganador->setNombre($this->crupier->getNombre());
            return;
        }

        $this->puntero++;

        // CRUPIER
        $this->darCartaCrupier();

        $valorManoCrupier = $this->crupier->getMano()->getPuntuacion();
        if ($valorManoCrupier > 21 || $valorManoJugador == 21) {
            $this->ganador->setNombre($this->jugador->getNombre());
        }

        $this->puntero++;
    }

    public function darCartaCrupier() {
        $mazo = $this->mazo->getMazo();
        $nuevaCartaCrupier = $this->crupier->getMano()->getCartas();
        $valorManoCrupier = $this->crupier->getMano()->getPuntuacion();

        if ($valorManoCrupier >= 17) {
            return;
        } elseif ($valorManoCrupier < 11) {
            $cartaCrupier = $mazo[$this->puntero];
            $nuevaCartaCrupier[] = $cartaCrupier;
            $this->crupier->getMano()->setCartas($nuevaCartaCrupier);
        } else {
            if (rand(0, 1) === 1) {
                $cartaCrupier = $mazo[$this->puntero];
                $nuevaCartaCrupier[] = $cartaCrupier;
                $this->crupier->getMano()->setCartas($nuevaCartaCrupier);
            }
        }

        $valorManoCrupier = $this->calcularPuntuacion($nuevaCartaCrupier);
        $this->crupier->getMano()->setPuntuacion($valorManoCrupier);

        session()->put('valorManoCrupier', $valorManoCrupier);

        $this->puntero++;
    }

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
    }session()->forget('mensaje');
}

    public function calcularPuntuacion($cartas) {
        $puntuacion = 0;
        $numeroAses = 0;

        foreach ($cartas as $carta) {

            if ($carta->getValor() > 10) {
                $puntuacion += 10;
            } elseif ($carta->getValor() == 1) {
                $numeroAses++;
                $puntuacion += 11;
            } else {
                $puntuacion += $carta->getValor();
            }
        }

        while ($puntuacion > 21 && $numeroAses > 0) {
            $puntuacion -= 10;
            $numeroAses--;
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
