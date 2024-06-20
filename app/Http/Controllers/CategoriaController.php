<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /* inserción de datos */
    public function insertar(Request $req){
        $categoria= new Categoria();
        
        $categoria->nom_cat = $req->nom_cat;

        $categoria->save();

        return redirect()->back();

    }

    /* Select * from */
    function mostrar(){
        $datos_cat=Categoria::all();
        return view("form_cat", compact("datos_cat"));
    }
}
