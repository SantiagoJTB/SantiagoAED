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
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\FicheroController;
use App\Http\Controllers\FicheroCsvController;

use function Ramsey\Uuid\v1;

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

Route::get('iniciocreardirectorio', function(){
    return view('formcreardirectorio');
});

Route::get('/crear-directorio', [DirectorioController::class, 'crearDirectorio'])->name('crearDirectorio');

Route::get('/inicioSubirFichero', function(){
    return view('inicioSubirFichero');
});

Route::match(['get', 'post'], '/crearDir', [FicheroController::class, 'crearDirectorio'])->name('crearDirectorio');

Route::get('/crearFichero', function () {
    return view('ejercicio18');
})->name('formularioFichero');

Route::post('/crearFichero', [FicheroCsvController::class, 'crearFichero'])->name('crearFichero');

Route::get('/leerFichero', [FicheroCsvController::class, 'leerFichero'])->name('leerFichero');

Route::get('/listarFicheros', [FicheroCsvController::class, 'listarFicheros'])->name('listarFicheros');

Route::get('/descargar/{nombreFichero}', [FicheroCsvController::class, 'descargarFichero'])->name('descargarFichero');
Route::get('/borrar/{nombreFichero}', [FicheroCsvController::class, 'borrarFichero'])->name('borrarFichero');

/** Creacion de To Do */

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta de tareas
Route::match(['get', 'post'], '/iniciotodo', [ToDoController::class, 'iniciotodo'])->name('iniciotodo');
