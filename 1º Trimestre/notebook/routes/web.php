<?php

use App\Http\Controllers\DirectorioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[LoginController::class,"loginget"])->name('loginget');
Route::post('/login', [LoginController::class,"loginAutentification"])->name('login.autentification');
Route::post('/logout', [LoginController::class,"logout"])->name('logout');
Route::get('/registro', [LoginController::class,"registroget"])->name('registroget');
Route::post('/registro', [LoginController::class,"registroAutentification"])->name('registro.autentification');
Route::post('/editorpost', [EditorController::class,"editorpost"]);
Route::any('/editor', [EditorController::class,"editorget"])->name('editor.get');

