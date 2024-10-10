<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
Route::get('/', function () {
    return view('inicio');
});
Route::post('/partida',[AppController::class, 'inicioPartida']);
Route::post('/partida/juego',[AppController::class, 'eleccionJugador'])->name('juego');

