<?php

use App\Http\Controllers\DirectorioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LoginController;

Route::get('/',[LoginController::class,"loginget"])->name('loginget');
Route::post('/', [LoginController::class,"loginAutentification"])->name('login.autentification');
Route::post('/logout', [LoginController::class,"logout"])->name('logout');
Route::get('/registro', [LoginController::class,"registroget"])->name('registroget');
Route::post('/registro', [LoginController::class,"registroAutentification"])->name('registro.autentification');
Route::post('/editorpost', [EditorController::class,"editorpost"]);
Route::any('/editor', [EditorController::class,"editorget"])->name('editor.get');
