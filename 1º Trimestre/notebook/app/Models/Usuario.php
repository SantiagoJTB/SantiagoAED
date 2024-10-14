<?php
namespace app\Models;

class Usuario{
    protected $nick;
    protected $password;
    protected $dirArray;

    public function __construct(string $nick, string $password) {
        $this->nick = $nick;
        $this->password = $password;
        $this->dirArray = [];
    }

    /**
     * Get the value of nick
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set the value of nick
     *
     * @return  self
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    /**
     * Get the value of dirArray
     */
    public function getDirArray()
    {
        return $this->dirArray;
    }

    /**
     * Set the value of dirArray
     *
     * @return  self
     */
    public function setDirArray($dirArray)
    {
        $this->dirArray = $dirArray;

        return $this;
    }
}
