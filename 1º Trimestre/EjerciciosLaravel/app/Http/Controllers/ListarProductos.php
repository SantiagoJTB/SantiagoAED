<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ListarProductos extends Controller
{
    public function tipo(Request $request)
    {
        if ($request->isMethod("get")) {
            return "la peticion es get";
        } else if ($request->isMethod("post")) {
            return "la peticion es post";
        }
    }
}
class Foo
{
    /** @var string $name Should contain a name */
    protected string $name;

    /** @var string $description Should contain a description */
    protected string $description;

    /**
     *
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    /** @return string */
    public function getName(): string
    {
        return $this->name;
    }

    /** @return string */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     *
     * @return string
     */
    public function toString(): string
    {
        return "nombre: " . $this->name . ", descripcion: " . $this->description;
    }
}

$foo = new Foo("santi", "alumno");
echo $foo->toString();
