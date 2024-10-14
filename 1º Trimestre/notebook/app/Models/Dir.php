<?php
namespace app\Models;

class Dir{
    protected $nombreDir;
    protected $dir;

    public function __construct(string $nombreDir) {
        $this->nombreDir = $nombreDir;
        $this->dir = mkdir($nombreDir);
    }

    /**
     * Get the value of nombreDir
     */
    public function getNombreDir()
    {
        return $this->nombreDir;
    }

    /**
     * Set the value of nombreDir
     *
     * @return  self
     */
    public function setNombreDir($nombreDir)
    {
        $this->nombreDir = $nombreDir;

        return $this;
    }

    /**
     * Get the value of dir
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * Set the value of dir
     *
     * @return  self
     */
    public function setDir($dir)
    {
        $this->dir = $dir;

        return $this;
    }
}
