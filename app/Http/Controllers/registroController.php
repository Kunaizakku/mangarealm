<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class registroController extends Controller
{
    /* inserción de datos */
    public function insertar(Request $req){
        $usuario= new Usuario();
        
        $usuario->username = $req->username;
        $usuario->email = $req->email;
        $usuario->password = $req->password;
        $usuario->rol = 1;
        $usuario->estatus = 1;

        $usuario->save();

        return redirect()->back();

    }

    public function login(Request $request)
    {
        $nombre = $request->input('user');
        $contraseña = $request->input('password');
    
        $usuario = $this->buscar($nombre,$contraseña);
    
        if ($usuario) {
            // Establecer las variables de sesión
            session([
                'id' => $usuario->id,
                'nombre' => $usuario->username,
                'contraseña' => $contraseña,
                'rol' => $usuario->rol
            ]);

            /*para verificar si si funciona
            dd($usuario->fk_tipo_usuario);
             */

            if ($usuario->rol == 1) { // Redirigir al usuario con un mensaje de bienvenida
                return redirect()->to( '/')->with('success', '¡Bienvenido(a)!');
            }
            if ($usuario->rol == 2) {
                return redirect()->to('/')->with('success', 'Bienvenido(a)');
            }
            
        } else {
            // Redirigir al usuario con un mensaje de error
            return redirect()->to('/login')
            ->with('error_credentials', 'Usuario o contraseña incorrectos')
            ->with('error_retry', 'Introduzca sus datos de nuevo')
            ->with('use_js_alerts', true);
        }
    }

    public function logout() {
        Auth::logout(); 
        session()->flush();// Cierra la sesión del usuario
        return redirect('/')->with('success', 'Sesión cerrada'); // Redirige a la página de inicio de sesión u otra página de tu elección
    }

    private function buscar($nombre, $contraseña)
    {
        $usuario = Usuario::where('username', $nombre)
            ->where('estatus', 1)
            ->first();
    
        if ($usuario && $contraseña == $usuario->password) {
            return $usuario;
        } else {
            return null;
        }
    }

    /* Select * from */
    function mostrar(){
        $datos_usuarios=Usuario::all();
        return view("lista_usuario", compact("datos_usuarios"));
    }
}
