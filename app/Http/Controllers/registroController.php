<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class registroController extends Controller
{
    /* inserción de datos */
    public function insertar(Request $req){
        $usuario= new Usuario();
        
        $usuario->username = $req->username;
        $usuario->email = $req->email;
        $usuario->password = $req->password;
        $usuario->estatus = 1;

        $usuario->save();

        return redirect()->back();

    }

    /* Select * from */
    function mostrar(){
        $datos_usuarios=Usuario::all();
        return view("lista_usuario", compact("datos_usuarios"));
    }
}
