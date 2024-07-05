<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capitulo;
class CapituloController extends Controller
{

    const DEFAULT_ESTATUS = 81;
    /* inserción de datos */
    public function insertar(Request $req)
    {
        $capitulo = new Capitulo();

        $capitulo->fk_manga = $req->fk_manga;
        $capitulo->num_capitulo = $req->num_capitulo;
        $capitulo->slug = self::DEFAULT_ESTATUS;

        $capitulo->save();

        return redirect()->back();

    }


    function mostrar($id){
        $datos_cap = Capitulo::where('fk_manga', $id)->get();
    return view("form_cap2", compact("datos_cap", "id"));
   }
}
