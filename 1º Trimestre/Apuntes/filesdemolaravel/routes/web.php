<?php

use App\Http\Controllers\PruebasFicheros;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/crearnumerostexto', [PruebasFicheros::class, 'guardarNumerosEnFicheroTexto']);

Route::get(
    '/creargrande',
    [
        PruebasFicheros::class,
        'crearFicheroGrande'
    ]
);

Route::get(
    '/leercompleto',
    [
        PruebasFicheros::class,
        'leerFicheroCompleto'
    ]
);

Route::get(
    '/leerporlineas',
    [
        PruebasFicheros::class,
        'leerFicheroPorTrozos'
    ]
);


Route::get(
    '/registrobinario',
    [
        PruebasFicheros::class,
        'escribirRegistroBinario'
    ]
);
