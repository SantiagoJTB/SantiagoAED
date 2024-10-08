<?php
namespace App\Models;

class Jugador{
    public $nombre;
    public $mano;

    public function __construct($nombre){
        $this->nombre = $nombre;
        $this->mano = new Mano(0, null);
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getMano()
    {
        return $this->mano;
    }

    public function setMano($mano)
    {
        $this->mano = $mano;

        return $this;
    }
}
