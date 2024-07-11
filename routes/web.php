<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\CapituloController;
use App\Http\Controllers\PaginaController;
use App\Models\Pagina;

Route::get('/', [MangaController::class, 'mostrarManga'])->name('welcome');


Route::post('/registroUsuario', [registroController::class, 'insertar'])->name('usuario.insertar');
Route::post('/registroCategoria', [CategoriaController::class, 'insertar'])->name('cat.insertar');
Route::post('/registroManga', [MangaController::class, 'insertar'])->name('man.insertar');
Route::get('/listadoCat', [CategoriaController::class,'mostrar'])->name('cat.mostrar');
Route::get('/categorias', [Categoriacontroller::class,'ver'])->name('cat.listas');
Route::post('/registroManga', [MangaController::class, 'insertar'])->name('man.insertar');
Route::get('/categoria/{categoriaId}/mangas', [MangaController::class,'mangaCat'])->name('cat.manga');
Route::get('/formManga', [MangaController::class,'create'])->name('man.create');
Route::get('/Form_Cap', [MangaController::class,'mostrarMangaCap'])->name('man.mostrarMangaCap');
Route::post('/form_cap2', [CapituloController::class,'insertar'])->name('cap.insertar');
Route::get('/listadoCap/{id}', [CapituloController::class,'mostrar'])->name('cap.mostrar');
Route::get('/mangas2', [MangaController::class,'mostrar2'])->name('mangas');
Route::get('/detalle_mangas/{mangaId}', [MangaController::class,'detalle_mangas'])->name('detalle_mangas');
Route::get('/detallepagina/{capituloId}', [PaginaController::class,'pag_cap'])->name('detallepagina');
// Route::get('/mangas', function () {return view('manga');})->name('mangas');


// routes/web.php
Route::get('/Form_pag/{capituloId}', function ($capituloId) {
    return view('form_pagina', ['capituloId' => $capituloId]);
})->name('form_pag');

Route::post('/submit_form', [PaginaController::class, 'insertar'])->name('submit_form');



Route::match(['get', 'post'], '/login', [registroController::class, 'login'])->name('usuario.login');
Route::get('/iniciarsesion', function () {
    return view('login');
})->name('login');

Route::get('/logout', [registroController::class, 'logout'])->name('logout');



Route::get('/Form_cap', function () {return view('form_cap');})->name('form_cap');
// Route::get('/form_cap2/{id}', function ($id) {
//     return view('form_cap2', ['id' => $id]);})->name('form_cap2');
Route::get('/formularios', function () {return view('formularios');})->name('formularios');
Route::get('/form_cat', function () {return view('form_cat');})->name('form_cat');
// Route::get('/form_manga', function () {return view('form_manga');})->name('form_manga');
// // Route::get('/categoria', function () {return view('categoria');})->name('cat');


Route::get('/listadoMan', [MangaController::class,'mostrar'])->name('man.mostrar');

// Route::get('/categoria', function () {return view('categoria');})->name('cat');
