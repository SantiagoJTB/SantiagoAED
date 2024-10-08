<?php

namespace App\Models;

class Carta{
    private $valor;
    private $tipo;

    public function __construct(int $valor = null, string $tipo = null) {
        $this->valor = $valor;
        $this->tipo = $tipo;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

}
