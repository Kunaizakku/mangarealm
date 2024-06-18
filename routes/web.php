<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registroController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/registroUsuario', [registroController::class, 'insertar'])->name('usuario.insertar');


Route::get('/login', function () {
    return view('login');
})->name('login');