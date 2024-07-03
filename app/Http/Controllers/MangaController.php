<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Categoria;

class MangaController extends Controller
{
    /* inserción de datos */
    const DEFAULT_ESTATUS = 1;

    public function insertar(Request $req)
    {

        // dd('desde el controlador');

        $req->validate([
            'fk_categoria' => 'required|exists:categoria,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'portada' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejar la carga de la imagen
        $path = null;
        if ($req->hasFile('portada')) {
            $path = $req->file('portada')->store('portadas', 'public');
        }


        $manga = new Manga();
        $manga->fk_categoria = $req->fk_categoria;
        $manga->titulo = $req->titulo;
        $manga->descripcion = $req->descripcion;
        $manga->autor = $req->autor;
        $manga->genero = $req->genero;
        $manga->estatus = self::DEFAULT_ESTATUS;
        $manga->portada = $path; // Guardar la ruta de la imagen

        $manga->save();



        return redirect()->back()->with('success', 'Manga creado exitosamente');
    }

    public function mostrar()
    {
        $categorias = Categoria::all();
        return view('form_manga', compact('categorias'));
    }


    /* Select * from */
    // function mostrar(){
    //     $datos_man=Manga::all();
    //     return view("form_manga", compact("datos_man"));
    // }
}
