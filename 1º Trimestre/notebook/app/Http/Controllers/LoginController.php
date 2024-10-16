<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function loginget(){
        return view('login');
    }

    public function loginAutentification(Request $request){
        if($request->has('userName') && $request->has('userPassword')){
            $nombreIntroducido = $request->input('userName');
            $pwIntroducida = $request->input('userPassword');
            $datosIntroducidos = $nombreIntroducido.','.$pwIntroducida;

            $usuarios = file_get_contents('users.txt');
            $usuariosArray = explode("\n", $usuarios);

            if(in_array($datosIntroducidos, $usuariosArray)){
                session();
                return view ('directorio', ['nombre' => $nombreIntroducido]);
            }

        }else{
            return view('login');
        }
    }

    public function logout(){
        session_destroy();
        return redirect('login');
    }

    public function registro(){
        return view('registro');
    }
    
    public function registroAutentification(Request $request){
        if($request->has('userNameRegistro') && $request->has('userPasswordRegistro') && $request->has('userPasswordConfirmacion')){
            $nombreIntroducido = $request->input('userNameRegistro');
            $pwIntroducida = $request->input('userPasswordRegistro');
            $pwConfirmacion = $request->input('userPasswordConfirmacion');

            if($pwIntroducida == $pwConfirmacion){
                $datosIntroducidos = $nombreIntroducido.','.$pwIntroducida;

                $usuarios = file_get_contents('users.txt');
                $usuariosArray = explode("\n", $usuarios);

                if(!in_array($datosIntroducidos, $usuariosArray)){
                    file_put_contents('users.txt', $datosIntroducidos."\n", FILE_APPEND);
                    mkdir($nombreIntroducido);
                    return view('login');
                }
            }
        }
        return view('registro');
    }

    /**pasar el nombre a UsersNames[], comprobar contraseña,(fichero: users.txt) if(!exist(name))-> crear directorio(name)-> (if(exist))->
        mostrar enlaces a directorios (privado y publico)->
        publico->mostrar enlaces ficheros,
        privados->mostrar enlace directorios->mostrar enlace ficheros para abrir con editor */
}
