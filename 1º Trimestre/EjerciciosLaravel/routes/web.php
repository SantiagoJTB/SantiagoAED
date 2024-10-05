<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\ListarProductos;
use App\Http\Controllers\NumberController;

Route::get('/', function () {
    return "página raíz de nuestra aplicación";
});

Route:: post('/pruebita', function(){
    return 'Se ha ejecutado una petición POST a la dirección: /pruebita';
});

Route:: any('/relatos/numero', function(){
    return 'petición recibida para el parámetro: numero';
});


Route::match(['get', 'post'], '/', [ListarProductos::class, 'tipo']);

Route::get('/primos', [HomeController::class, 'primos']);

Route::get('/sleep', [HomeController::class, 'sleep']);

Route::get('/numbers', [NumberController::class, 'showNumbers']);


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
