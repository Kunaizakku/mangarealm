<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /* inserción de datos */
    public function insertar(Request $req)
    {
        // Validar el nombre de la categoría para que sea único
        $validatedData = $req->validate([
            'nom_cat' => 'required|unique:categoria,nom_cat|max:255',
        ]);

        // Crear una nueva instancia de la categoría y asignar el valor
        $categoria = new Categoria();
        $categoria->nom_cat = $req->nom_cat;

        // Guardar la nueva categoría en la base de datos
        $categoria->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Categoría agregada exitosamente.');
    }

    /* Select * from */
    function mostrar(){
        $datos_cat=Categoria::all();
        return view("form_cat", compact("datos_cat"));
    }
    function ver(){
        $cats=Categoria::all();
        return view("categoria", compact("cats"));
    }
}
