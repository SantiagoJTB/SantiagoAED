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


    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    public function getCartas()
    {
        return $this->cartas;
    }

    public function setCartas($cartas)
    {
        $this->cartas = $cartas;

        return $this;
    }
}
