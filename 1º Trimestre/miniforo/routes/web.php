<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\miniforoController;



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/' , function (){
    return view('login');

});
Route::get('/inicio', function (){
    return view('inicio');

});
