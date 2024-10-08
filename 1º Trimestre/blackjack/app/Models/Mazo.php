<?php
namespace App\Models;

use App\Models\Carta;

class Mazo{

    public $mazo = [];

    public function __construct(){
        $this->mazo = $this->generarMazo();
    }

    public function generarMazo(){

        $tipos = ['T', 'D', 'C', 'P'];

        for ($i = 1; $i <= 13; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $carta = new Carta($i, $tipos[$j]);
                $this->mazo[] = $carta;
            }
        }

        return shuffle($this->mazo);
    }

    public function getMazo()
    {
        return $this->mazo;
    }

    public function setMazo($mazo)
    {
        $this->mazo = $mazo;

        return $this;
    }
}

?>
