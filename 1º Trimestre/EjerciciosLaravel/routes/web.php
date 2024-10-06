<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\ListarProductos;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListaColoresController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioCSVController;


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

Route::get('/colores', [ListaColoresController::class, 'listacolores'])->name('listacolores');
Route::post('/colores', [ListaColoresController::class, 'listacolores']);
Route::post('/colores/eliminar', [ListaColoresController::class, 'eliminarColores'])->name('eliminarColores');


Route::get('/usuario', [UserController::class, 'mostrarFormulario'])->name('usuario.mostrarFormulario');
Route::post('/usuario', [UserController::class, 'procesarFormulario'])->name('usuario.procesarFormulario');

Route::get('/crear-csv', [UsuarioCSVController::class, 'crearCSV'])->name('crearCSV');
Route::get('/leer-csv', [UsuarioCSVController::class, 'leerCSV'])->name('leerCSV');

/** Creacion de To Do */

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta de tareas
Route::match(['get', 'post'], '/iniciotodo', [ToDoController::class, 'iniciotodo'])->name('iniciotodo');
