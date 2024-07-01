<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MangaController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/registroUsuario', [registroController::class, 'insertar'])->name('usuario.insertar');
Route::post('/registroCategoria', [CategoriaController::class, 'insertar'])->name('cat.insertar');
Route::get('/listadoCat', [Categoriacontroller::class,'mostrar'])->name('cat.mostrar');
Route::get('/categorias', [Categoriacontroller::class,'ver'])->name('cat.listas');
Route::post('/registroManga', [MangaController::class, 'insertar'])->name('man.insertar');
Route::get('/formManga', [MangaController::class,'create'])->name('man.create');



Route::get('/login', function () {return view('login');})->name('login');
Route::get('/formularios', function () {return view('formularios');})->name('formularios');
Route::get('/form_cat', function () {return view('form_cat');})->name('form_cat');
Route::get('/mangas', function () {return view('manga');})->name('mangas');
Route::get('/categoria de mangas', function () {return view('cat_manga');})->name('cat.manga');
// Route::get('/form_manga', function () {return view('form_manga');})->name('form_manga');
// // Route::get('/categoria', function () {return view('categoria');})->name('cat');


