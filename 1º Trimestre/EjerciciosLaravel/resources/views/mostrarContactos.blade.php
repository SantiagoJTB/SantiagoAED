<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
</head>
<body>
    <h1>Lista de Contactos</h1>

    @if($mensaje)
        <p>{{ $mensaje }}</p>
    @else
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
    @endif

    <a href="{{ url()->previous() }}">Volver</a>
</body>
</html>
