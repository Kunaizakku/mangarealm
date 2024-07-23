<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use App\Models\Manga;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;
use App\Models\Pagina;

class PaginaController extends Controller
{
    public function insertar(Request $request)
    {

        // dd($request->all());
        try{
            $data = $request->validate([
                'paginas.*.fk_capitulo' => 'required|exists:capitulos,id',
                'paginas.*.num_pagina' => 'required|integer',
                'paginas.*.imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            foreach ($data['paginas'] as $paginaData) {

                $capituloId = $paginaData['fk_capitulo'];

                
                $capitulo = Capitulo::findOrFail($paginaData['fk_capitulo']);
                $manga = Manga::findOrFail($capitulo->fk_manga);
                $mangaTitle = preg_replace('/[^A-Za-z0-9\-]/', '_', $manga->titulo);


                $mangaFolder = public_path('paginas/' . $mangaTitle . '/capitulo' . $capitulo->num_capitulo );
                if (!file_exists($mangaFolder)) {
                    mkdir($mangaFolder, 0777, true);
                }

                // Mueve la imagen a la carpeta del manga
                $imageName = time() . '-' . $paginaData['imagen']->getClientOriginalName();
                $paginaData['imagen']->move($mangaFolder, $imageName);

                // $imageName = time() . '-' . $paginaData['imagen']->getClientOriginalName();
                // $paginaData['imagen']->move(public_path('paginas'), $imageName);

                // Pagina::create([
                //     'fk_capitulo' => 
                //     'num_pagina' => $paginaData['num_pagina'],
                //     'imagen' => $imageName,
                // ]);

                Pagina::create([
                    'fk_capitulo' => $capituloId,
                    'num_pagina' => $paginaData['num_pagina'],
                    'imagen' => 'paginas/' . $mangaTitle . '/capitulo' . $capitulo->num_capitulo . '/' . $imageName,
                ]);
            }
        }catch (\Exception $e) {
            Log::error('Error al guardar páginas: ' . $e->getMessage());
            return response()->json(['error' => 'Error al guardar las páginas. Inténtalo de nuevo.'], 500);
        }
        

        return redirect()->route('welcome')->with('success', 'Páginas creadas exitosamente');
    }

    public function pag_cap($capituloId)
    {
        // Obtener todos los mangas de esa categoría
        $pag_cap = Pagina::where('fk_capitulo', $capituloId)->get();

        // Obtener el capítulo y manga desde la base de datos
        $capitulo = Capitulo::find($capituloId);
        $num_capitulo = $capitulo ? $capitulo->num_capitulo : null;
        $mangaId = $capitulo ? $capitulo->fk_manga : null;

        // Obtener el capítulo siguiente y anterior si existen
        $prevCapitulo = Capitulo::where('fk_manga', $mangaId)
                                ->where('num_capitulo', '<', $num_capitulo)
                                ->orderBy('num_capitulo', 'desc')
                                ->first();

        $nextCapitulo = Capitulo::where('fk_manga', $mangaId)
                                ->where('num_capitulo', '>', $num_capitulo)
                                ->orderBy('num_capitulo', 'asc')
                                ->first();

        return view('detallepagina', compact('pag_cap', 'num_capitulo', 'mangaId', 'prevCapitulo', 'nextCapitulo'));
    }

}