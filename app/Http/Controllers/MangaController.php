<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;

class MangaController extends Controller
{
    /* inserción de datos */
    public function insertar(Request $req){
        $manga= new Manga();

        $manga->fk_categoria = $req->fk_categoria;
        $manga->titulo = $req->titulo;
        $manga->descripcion = $req->descripcion;
        $manga->autor = $req->autor;
        $manga->genero = $req->genero;
        $manga->estatus = $req->estatus;

        $manga->save();

        return redirect()->back();

    }

    /* Select * from */
    function mostrar(){
        $datos_man=Manga::all();
        return view("form_manga", compact("datos_man"));
    }
}
