<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Categoria;
use App\Models\Capitulo;

class MangaController extends Controller
{
    /* inserción de datos */

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
            $image = $req->file('portada');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('portadas'), $filename);
            $path = $filename;
        }


        $manga = new Manga();
        $manga->fk_categoria = $req->fk_categoria;
        $manga->titulo = $req->titulo;
        $manga->descripcion = $req->descripcion;
        $manga->autor = $req->autor;
        $manga->genero = $req->genero;
        $manga->portada = $path; // Guardar la ruta de la imagen

        $manga->save();



        return redirect()->back()->with('success', 'Manga creado exitosamente');
    }

    public function mostrar()
    {
        $categorias = Categoria::all();
        return view('form_manga', compact('categorias'));
    }

    public function mostrarManga()
    {
        $manga = Manga::orderby('id', 'desc')->limit(20)->get();
        return view('welcome', compact('manga'));
    }

    public function mostrar2()
    {
        $mangas = Manga::all();
        return view('manga', compact('mangas'));
    }

    public function mangaCat($categoriaId)
    {
        // Obtener todos los mangas de esa categoría
        $mangaCat = Manga::where('fk_categoria', $categoriaId)->get();
        return view('cat_manga', compact('mangaCat', 'categoriaId'));
    }

    public function mostrarMangaCap()
    {
        $mangas = Manga::orderby('id', 'desc')->limit(20)->get();
        return view('form_cap', compact('mangas'));
    }

    public function detalle_mangas($mangaId)
    {
        $manga = Manga::find($mangaId);

        if (!$manga) {
            return redirect()->route('listado_mangas')->with('error', 'Manga no encontrado.');
        }

        $capitulos = Capitulo::where('fk_manga', $mangaId)->get();

        return view('detallemanga', compact('manga', 'capitulos'));
    }




    /* Select * from */
    // function mostrar(){
    //     $datos_man=Manga::all();
    //     return view("form_manga", compact("datos_man"));
    // }
}
