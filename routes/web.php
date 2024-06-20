<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registroController;
use App\Http\Controllers\CategoriaController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/registroUsuario', [registroController::class, 'insertar'])->name('usuario.insertar');
Route::post('/registroCategoria', [CategoriaController::class, 'insertar'])->name('cat.insertar');
Route::get('/listadoCat', [Categoriacontroller::class,'mostrar'])->name('cat.mostrar');


Route::get('/login', function () {return view('login');})->name('login');
Route::get('/formularios', function () {return view('formularios');})->name('formularios');
Route::get('/form_cat', function () {return view('form_cat');})->name('form_cat');