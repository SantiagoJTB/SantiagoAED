<?php
namespace app\Models;

class Fichero{
    protected $nombreFichero;
    protected $fichero;

    public function __construct(string $nombreFichero) {
        $this->nombreFichero = $nombreFichero;
        $this->fichero = fopen($nombreFichero, "x+");
    }

    /**
     * Get the value of nombreFichero
     */
    public function getNombreFichero()
    {
        return $this->nombreFichero;
    }

    /**
     * Set the value of nombreFichero
     *
     * @return  self
     */
    public function setNombreFichero($nombreFichero)
    {
        $this->nombreFichero = $nombreFichero;

        return $this;
    }

    /**
     * Get the value of fichero
     */
    public function getFichero()
    {
        return $this->fichero;
    }

    /**
     * Set the value of fichero
     *
     * @return  self
     */
    public function setFichero($fichero)
    {
        $this->fichero = $fichero;

        return $this;
    }
}
