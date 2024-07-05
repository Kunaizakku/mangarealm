<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capitulo;
use App\Models\Manga;

class CapituloController extends Controller
{
    /* inserción de datos */
    public function insertar(Request $req)
    {
        $capitulo = new Capitulo();

        $capitulo->fk_manga = $req->fk_manga;
        $capitulo->num_capitulo = $req->num_capitulo;

        $capitulo->save();

        return redirect()->back();

    }

    public function mostrarman()
    {
        $mangas = Manga::all();
        return view('form_cap', compact('mangas'));
    }


    /* Select * from */
    // function mostrar(){
    //     $datos_man=Manga::all();
    //     return view("form_manga", compact("datos_man"));
    // }
}
