<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartasController;

// Ruta que maneja GET y POST para la raíz
Route::match(['get', 'post'], '/',
[CartasController::class, 'generarCartas'])->name('cartas.generar');
