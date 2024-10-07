
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function subir(Request $request){

        $file = $request->myfile;
        echo 'File Name: '.$file->getClientOriginalName(); //Display File Name
        echo '<br>';
        echo 'File Extension: '.$file->getClientOriginalExtension(); //Display File Extension
        echo '<br>';
        echo 'File Real Path: '.$file->getRealPath(); //Display File Real Path
        echo '<br>';
        echo 'File Size: '.$file->getSize(); //Display File Size
        echo '<br>';
        echo 'File Mime Type: '.$file->getMimeType().'<br>'; //Display File Mime Type
        $nombrefichero = $file->getClientOriginalName();
        $path = $file->storeAs("/", $nombrefichero);
        echo $path;

        return fgetcsv($file);

        }

}
