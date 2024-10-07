<?php

namespace App\Models;

class Cartas{
    private $valor;
    private $tipo;

    public function __construct(int $valor = null, string $tipo = null) {
        $this->valor = $valor;
        $this->tipo = $tipo;
    }



    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of tipos
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipos
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
}
