<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapituloController extends Controller
{
    /* inserción de datos */
    const DEFAULT_ESTATUS = 1;

    public function insertar(Request $req)
    {
        $manga = new Manga();

        $manga->fk_manga = $req->fk_manga;
        $manga->titulo = $req->titulo;
        $manga->descripcion = $req->descripcion;
        $manga->autor = $req->autor;
        $manga->genero = $req->genero;
        $manga->estatus = self::DEFAULT_ESTATUS;

        $manga->save();

        return redirect()->back();

    }

    public function create()
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
