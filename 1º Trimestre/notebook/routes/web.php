<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/editorpost', [EditorController::class,"editorpost"]);
Route::any('/editor', [EditorController::class,"editorget"]);

