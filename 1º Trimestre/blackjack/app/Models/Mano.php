<?php
namespace App\Models;

class Mano
{
    public $puntuacion;
    public $cartas;

    public function __construct(){
        $this->puntuacion = 0;
        $this->cartas = [];
    }



    /**
     * Get the value of cartas
     */
    public function getCartas()
    {
        return $this->cartas;
    }

    /**
     * Set the value of cartas
     *
     * @return  self
     */
    public function setCartas($cartas)
    {
        $this->cartas = $cartas;

        return $this;
    }

    /**
     * Get the value of puntuacion
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Set the value of puntuacion
     *
     * @return  self
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }
}
