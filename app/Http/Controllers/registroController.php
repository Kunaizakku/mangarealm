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

        $usuario = $this->buscar($nombre, $contraseña);

        if ($usuario) {
            // Verificar si el estatus del usuario es 0
            if ($usuario->estatus == 0) {
                // Redirigir al usuario con un mensaje de cuenta desactivada
                return redirect()->to('/iniciarsesion')
                    ->with('error_status', 'Tu cuenta está desactivada. Contacta al administrador.');
            }

            // Establecer las variables de sesión
            session([
                'id' => $usuario->id,
                'nombre' => $usuario->username,
                'contraseña' => $contraseña,
                'rol' => $usuario->rol
            ]);

            // Redirigir al usuario con un mensaje de bienvenida basado en el rol
            if ($usuario->rol == 1) {
                return redirect()->to('/')->with('success', '¡Bienvenido(a)!');
            } elseif ($usuario->rol == 2) {
                return redirect()->to('/')->with('success', 'Bienvenido(a): ' . $usuario->username);
            }
            
        } else {
            // Redirigir al usuario con un mensaje de error
            return redirect()->to('/iniciarsesion')
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

    public function mostrar_admin()
    {
        $usuario = Usuario::all();
        return view('lista_user', compact('usuario'));
    }

    public function actualizarRol($id, $rol)
    {
        // Encuentra el manga por su ID
        $user = Usuario::findOrFail($id);
        
        // Actualiza el estatus del manga
        $user->rol = $rol;
        $user->save();
        
        // Redirige de vuelta a la página de manga con un mensaje de éxito
        return redirect()->back()->with('success', 'Rol actualizado correctamente');
    }

    public function actualizarEstatus($id, $estatus)
    {
        // Encuentra el manga por su ID
        $user = Usuario::findOrFail($id);
        
        // Actualiza el estatus del manga
        $user->estatus = $estatus;
        $user->save();
        
        // Redirige de vuelta a la página de manga con un mensaje de éxito
        return redirect()->back()->with('success', 'Estatus actualizado correctamente');
    }

}
