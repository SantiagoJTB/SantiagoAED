<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ficheros y Contactos</title>
</head>
<body>
    <h1>Lista de Contactos</h1>

    @if(isset($mensaje))
        <p>{{ $mensaje }}</p>
    @endif

    @if(isset($contactos) && count($contactos) > 0)
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
            @foreach ($contactos as $contacto)
                <tr>
                    <td>{{ $contacto[0] }}</td>
                    <td>{{ $contacto[1] }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay contactos disponibles.</p>
    @endif

    <h2>Lista de Ficheros</h2>
<ul>
    @if(isset($archivos) && count($archivos) > 0)
        @foreach ($archivos as $archivo)
            @if ($archivo !== '.' && $archivo !== '..') <!-- Ignorar entradas '.' y '..' -->
                <li>
                    <a href="{{ route('descargarFichero', $archivo) }}">{{ $archivo }}</a>
                    <form action="{{ route('borrarFichero', $archivo) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit" onclick="
                        return confirm('¿Estás seguro de que quieres borrar este fichero?');">Borrar</button>
                    </form>
                </li>
            @endif
        @endforeach
    @else
        <p>No hay ficheros disponibles.</p>
    @endif
</ul>

</body>
</html>
