<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DirectoryIterator;

class LoginController extends Controller{
    public function loginget(){
        return view('login');
    }
    public function loginAutentification(Request $request){
        if ($request->has('userName') && $request->has('userPassword')) {

            $nombreIntroducido = $request->input('userName');
            $pwIntroducida = $request->input('userPassword');

            // Carga el contenido de users.txt
            $usuarios = file_get_contents('users.txt');
            $usuariosArray = explode("\n", $usuarios);

            // El usuario exite en users.txt
            foreach ($usuariosArray as $usuario) {
                $datos = explode(",", $usuario);

                if (isset($datos[0], $datos[1])) {
                    $nombreUsuario = trim($datos[0]);
                    $passwordCifrada = trim($datos[1]);

                    // Comparamos el nombre y verificamos la contraseña
                    if ($nombreIntroducido === $nombreUsuario && 
                    password_verify($pwIntroducida, $passwordCifrada)) {
                    
                    Session::put('nombre', $nombreIntroducido);
                    $urlDirectorio = storage_path('app/private/' . $nombreIntroducido);
                    Session::put('urlDirectorio', $urlDirectorio);

                    $contenidoDirectorio = $this->getContenido($urlDirectorio);
                    Session::put('directorioPrivado', $contenidoDirectorio);

                    $contenidoPublico = $this->getContenido(storage_path('app/public'));
                    Session::put('directorioPublico', $contenidoPublico);

                    // Redirige a la vista 'directorio' pasando el contenido
                    return view('directorio', [
                        'contenidoPrivado' => $contenidoDirectorio,
                        'contenidoPublico' => $contenidoPublico,
                    ]);
                }
            
        
                }
            }

            return view('login')->with('mensaje', 'Nombre de usuario o contraseña incorrectos.');
        }

        return view('login')->with('mensaje', 'Por favor, complete todos los campos.');
    }


    public function logout(){
        Session::flush();
        return redirect('login');
    }

    public function registroget(){
        return view('registro');
    }

    public function registroAutentification(Request $request)
    {   //Datos introducidos
        if ($request->has('userNameRegistro') && $request->has('userPasswordRegistro') && $request->has('userPasswordConfirmacion')) {

            $nombreIntroducido = $request->input('userNameRegistro');
            $pwIntroducida = $request->input('userPasswordRegistro');
            $pwConfirmacion = $request->input('userPasswordConfirmacion');

            if ($pwIntroducida !== $pwConfirmacion) {
                return view('registro')->with('mensaje', 'Las contraseñas no coinciden.');
            }

            //¿Existe el usuario?
            $usuarios = explode("\n", file_get_contents('users.txt'));
            $usuarioExistente = false;
            foreach ($usuarios as $usuario) {
                $datos = explode(",", $usuario);
                if (isset($datos[0]) && trim($datos[0]) === $nombreIntroducido) {
                    $usuarioExistente = true;
                    break;
                }
            }
            if ($usuarioExistente) {
                return view('registro')->with('mensaje', 'El usuario ya existe.');
            }

            //Cifrar contraseña e introducir datos en el fichero
            $passwordCifrada = password_hash($pwIntroducida, PASSWORD_BCRYPT);
            $datosIntroducidos = $nombreIntroducido . ',' . $passwordCifrada;
            file_put_contents(public_path('users.txt'), $datosIntroducidos . "\n", FILE_APPEND);

            //Crear carpeta del usuario
            $ruta = storage_path("app/private/{$nombreIntroducido}");

            if (!is_dir($ruta)) {
                if (mkdir($ruta, 0755, true)) {
                    return view('login')->with('mensaje', 'Registro completado con éxito.');
                } else {
                    return view('registro')->with('mensaje', 'El usuario se ha registrado, pero hubo un problema al crear la carpeta.');
                }
            }
            return view('registro')->with('mensaje', 'El usuario se ha registrado, pero la carpeta ya existe.');
        }
        return view('registro')->with('mensaje', 'Faltan datos para el registro.');
    }
    public function mostrarDirectorioPrivado()
    {
        $nombreDirectorio = storage_path('app/private/'.session('nombre'));
    
        $contenidoDirectorio[] = $this->getContenido($nombreDirectorio);
    
        if (is_array($contenidoDirectorio)) {
            Session::put('directorioPrivado', $contenidoDirectorio);
        } else {
            Session::put('directorioPrivado', ['']);
        }
    }
    
    public function mostrarDirectorioPublico(){
        $nombreDirectorio = storage_path('app/public');
    
        $contenidoDirectorio[] = $this->getContenido($nombreDirectorio);
    
        if (is_array($contenidoDirectorio)) {
            Session::put('directorioPublico', $contenidoDirectorio);
        } else {
            Session::put('directorioPublico', []);
        }
    }
    public function getContenido($nombreDirectorio){
            $links = [];
            if (is_dir($nombreDirectorio)) {
                $iterador = new DirectoryIterator($nombreDirectorio);

                foreach ($iterador as $item) {
                    if (!$item->isDot()) {
                        $rutaCompleta = $item->getPathname();
                        $links[] = [
                            'nombre' => $item->getFilename(),
                            'ruta' => $rutaCompleta,
                            'tipo' => $item->isDir() ? 'directorio' : 'fichero'
                        ];
                    }
                }
            } else {
                return "El directorio no existe.";
            }

            return $links;
        }
    /**pasar el nombre a UsersNames[], comprobar contraseña,(fichero: users.txt) if(!exist(name))-> crear directorio(name)-> (if(exist))->
        mostrar enlaces a directorios (privado y publico)->
        publico->mostrar enlaces ficheros,
        privados->mostrar enlace directorios->mostrar enlace ficheros para abrir con editor */
}
