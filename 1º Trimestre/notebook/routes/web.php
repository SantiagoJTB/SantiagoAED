<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[LoginController::class,"loginget"]);
Route::post('/login', [LoginController::class,"loginAutentification"])->name('login.autentification');
Route::get('/logout', [LoginController::class,"logout"]);
Route::get('/registro', [LoginController::class,"registro"]);
Route::post('/registro', [LoginController::class,"registroAutentification"])->name('registro.autentification');

Route::post('/editorpost', [EditorController::class,"editorpost"]);
Route::any('/editor', [EditorController::class,"editorget"]);

