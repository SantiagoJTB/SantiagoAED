<?php

namespace App\Models;



class Persona{

    /**@var int */
    private $id;

    /**@var string */
    private $nombre;

    /**@var string */
    private $apellidos;

    /**@var int */
    private $edad;

    /**@var double */
    private $peso;

    public function __construct($n ="", $a = "", $e = 0, $p = 0.0){
        $this->nombre = $n;
        $this->apellidos = $a;
        $this->edad = $e;
        $this->peso = $p;

    }

    public function __toString(){
        return $this->id. ': ' .$this->nombre . ' ' . $this->apellidos . ' ' . $this->peso . ' ' . $this->edad;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of peso
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}
