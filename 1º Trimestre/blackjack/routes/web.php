<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

Route::match(['get', 'post'], '/', [AppController::class, 'inicio']);
Route::match(['get', 'post'], '/partida', [AppController::class, 'comienzoSesion']);
