<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contenido del CSV</title>
</head>
<body>
    <h1>Contenido del Archivo CSV</h1>

    @if (!empty($contenido))
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contenido as $fila)
                    <tr>
                        <td>{{ $fila[0] }}</td>
                        <td>{{ $fila[1] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay contenido en el archivo CSV.</p>
    @endif
</body>
</html>
