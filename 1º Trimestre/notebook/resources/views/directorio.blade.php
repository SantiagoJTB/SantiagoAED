<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Bienvenido {{session('nombre')}}</h2>
    <div id="directorioPrivado">Directorio privado:
        <ul>
            @if(session('directorioPrivado') && is_array(session('directorioPrivado')))
                @foreach(session('directorioPrivado') as $directorio)
                    <li><a href="{{ $directorio['ruta'] }}">{{ $directorio['nombre'] }}</a></li>
                @endforeach
            @else
                <li>No hay directorios privados disponibles.</li>
            @endif
        </ul>
    </div>
    <br>
    <div id="directorioPublico">Directorio público:
        <ul>
            @if(session('directorioPublico') && is_array(session('directorioPublico')))
                @foreach(session('directorioPublico') as $directorio)
                    <li><a href="{{ $directorio['ruta'] }}">{{ $directorio['nombre'] }}</a></li>
                @endforeach
            @else
                <li>No hay directorios públicos disponibles.</li>
            @endif
        </ul>
    </div>
    <div>
        <p>Crear nuevo fichero </p>
        <form method="post" action="{{route('editor.get')}}" enctype="multipart/form-data">
            @csrf
            <button type="submit">Crear fichero</button>
        </form>
    </div>
    <div>
        <form method="post" action="{{route('logout')}}">
            @csrf
            <input type="submit" value="Cerrar Sesión">
        </form>
    </div>
</body>
</html>
