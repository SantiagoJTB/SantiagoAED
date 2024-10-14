<?php

namespace App\Http\Controllers;

use App\Models\MapperPersona;
use App\Models\Persona;
use Exception;
use Illuminate\Http\Request;

class PruebasFicheros extends Controller
{

    //en esta función escribimos en binario y en texto un conjunto de  números
    //se observa que en binario ocupa menos espacio
    public function guardarNumerosEnFicheroTexto(){
        $filenameTexto="numeros_en_texto.txt";
        $fileTexto = fopen($filenameTexto, "w");

        $filenameBinario="numeros.dat";
        $fileBinario = fopen($filenameBinario, "w");

        if (!$fileTexto) {
            die("No se puede crear el archivo.");
        }
        if (!$fileBinario) {
            die("No se puede crear el archivo binario.");
        }

        for ($i = 0; $i < 10000000; $i++) {
            //escribimos el número como texto.
            //observar que tenemos que poner un separador: "\n" para distinguir entre
            //dos números seguidos.
            fwrite($fileTexto, $i ."\n");


            //ahora como binario
            $data = pack("i", $i);

            fwrite($fileBinario, $data);
        }

        fclose($fileTexto);
        fclose($fileBinario);

        echo "hecho!! ";

        // comprobamos que lo que escribimos en binario lo podemos recuperar correctamente
        // mostrando los primeros números y los últimos
        $filenameBinario="numeros.dat";
        $fileBinario = fopen($filenameBinario, "r");
        while (!feof($fileBinario)) {
            $numero = unpack("i", fread($fileBinario, 4))[1]; // Desempaquetamos el número

           if( $numero < 20 || $numero > 9999900)
            echo $numero . "<br> ";
        }


    }

    public function crearFicheroGrande(){
        $sizeLinea = 80;
        $filenameTexto="fichero_texto_grande.txt";
        $fileTexto = fopen($filenameTexto, "w");

        $lineasFichero = 10000000;

        if (!$fileTexto) {
            die("No se puede crear el archivo.");
        }

        $ceros = "";
        for($i= 0 ; $i < $sizeLinea; $i++){
            $ceros .= "0";
        }


        for ($i = 0; $i < $lineasFichero; $i++) {

            // Concatenamos el número actual a la derecha de los ceros
            $cadena_con_ceros = $ceros . $i;
            // Cortamos la cadena para quedarnos con los últimos 80 caracteres
            $strNumero = substr($cadena_con_ceros, -$sizeLinea);

            //escribimos el número como texto
            fwrite($fileTexto, $strNumero ."\n");


        }

        fclose($fileTexto);

        echo "Fichero grande grabado!!!!!";

    }

    public function leerFicheroCompleto(){
        $filenameTexto="fichero_texto_grande.txt";


        // Leer el contenido del archivo
        $contenido = file_get_contents($filenameTexto);

        // Comprobar si se pudo leer el archivo
        if ($contenido === false) {
            echo "Error al leer el archivo.";
            die();
        }

        $lineas = explode($contenido,"\n");

        foreach($lineas as $linea){
            if( (int)$linea < 10 )
                echo $linea . "<br>";
        }

    }

    public function leerFicheroPorTrozos(){
        $filenameTexto="fichero_texto_grande.txt";

        // Abrir el archivo en modo lectura
        $fileTexto = fopen($filenameTexto, "r");

        // Leer el archivo línea por línea
        if ($fileTexto !== false) {
            $lineaold="";
            while (($linea = fgets($fileTexto)) !== false) {
                $lineaold= $linea;
            }
            echo $lineaold;
            fclose($fileTexto);
        } else {
            echo "No se pudo abrir el archivo.";
        }

    }







    public function escribirRegistroBinario(){
        $fichero = '/tmp/personas.dat'; // Nombre del archivo binario

        
        $nombres = ["ana", "luisa", "axel", "rita"];
        $apellidos = ["martínez", "lópez", "garcía", "pérez"];

        $mapper = new MapperPersona();
        $cantidadPersonas = 4;

        //como tenemos registros tamaño fijo,podemos saber cuántos registros hay
        //si sabemos el tamño del fichero:
        $registros_guardados = filesize($fichero) / $mapper->getSizeRegistro();
        $personas = [];
        for($i=0 + $registros_guardados; $i < $cantidadPersonas + $registros_guardados; $i++){
            $edad = rand(1,100);
            $peso = (rand(500,1000))/10;
            $posNombre = rand(0,count($nombres)-1);
            $posApellidos = rand(0,count($apellidos)-1);
            $persona = (new Persona())
                ->setNombre($nombres[$posNombre])
                ->setId($i+1)
                ->setApellidos($apellidos[$posApellidos])
                ->setEdad($edad)
                ->setPeso($peso);

            $personas[] = $persona;
        }
        
        

        $fp = fopen($fichero, 'ab');
        foreach ($personas as $p) {
            $registro = $mapper->toRegistro($p);
            fwrite($fp, $registro);
        }
        fclose($fp);



        //podemos leer todo el fichero
        //$this->leerRegistros($fichero);

        //podemos leer un registro en concreto
        $this->leerRegistro($fichero,3);

    }


    function leerRegistros($fichero){
        // Abrir el archivo para leer en modo binario
        $fp = fopen($fichero, 'rb');

        $mapper = new MapperPersona();
        $sizeRegistro = $mapper->getSizeRegistro();

        // Leer hasta el final del archivo
        while (!feof($fp)) {
            // Leer un registro de tamaño fijo
            $registro = fread($fp, $sizeRegistro);




            $datos = $mapper->toPersona($registro);
            if($datos){
                echo "<br>";
                echo $datos;
                echo "<br>";

            }

        }

        // Cerrar el archivo
        fclose($fp);
    }

    //consideramos que $numeroRegistro empieza en 1 no en 0
    function leerRegistro($fichero,$numeroRegistro=1){
        // Abrir el archivo para leer en modo binario
        $fp = fopen($fichero, 'rb');

        $mapper = new MapperPersona();
        $sizeRegistro = $mapper->getSizeRegistro();


        //calculamos el byte al que hay que desplazarse 
        $offset = ($numeroRegistro - 1) * $sizeRegistro;

        // Desplazar el puntero al byte obtenido
        fseek($fp, $offset, SEEK_SET); // SEEK_SET nos posiciona en el principio del fichero así $offset es desde 0

  
        $registro = fread($fp, $sizeRegistro);

        // Cerrar el archivo
        fclose($fp);


        $datos = $mapper->toPersona($registro);
        if($datos){
            echo "<br>";
            echo $datos;
            echo "<br>";

        }

   


    }



}
