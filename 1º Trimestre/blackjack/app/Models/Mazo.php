<?php
namespace App\Models;

use App\Http\Controllers\CartasController;
use App\Models\Cartas;

class Mazo{

    public $cartas;

    public function __construct() {
        $cartasController = new CartasController();
        $this->cartas = $cartasController->generarCartas();
    }
}

?>
