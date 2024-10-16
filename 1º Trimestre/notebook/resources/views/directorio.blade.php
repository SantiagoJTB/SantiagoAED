<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>Directorios privados:
        <ul>
            @foreach($directoriosPrivados as $directorio)
            <li>{{$directorio}}</li>
            @endforeach
        </ul>
    </div>
    <div>Directorios publicos:
        <ul>
            @foreach($directoriosPublicos as $directorio)
            <li>{{$directorio}}</li>
            @endforeach
        </ul>
        <p>Crear nuevo directorio </p>
        <form method="post" action="{{route('crearDirectorio')}}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre del directorio">
            <input type="radio" name="nuevoDirectorio" value="0"> Publico
            <input type="radio" name="nuevoDirectorio" value="1" checked> Privado
            <input type="submit" value="Crear">
        </form>
    </div>
</body>
</html>
