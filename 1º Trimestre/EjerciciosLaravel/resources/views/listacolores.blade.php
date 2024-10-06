<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Colores</title>
</head>
<body>

    <h1>Lista de Colores</h1>

    <form action="{{ route('listacolores') }}" method="POST">
        @csrf
        <label for="color">Ingresa un color:</label>
        <input type="text" name="color" id="color" required>
        <button type="submit">Agregar Color</button>
    </form>

    @if (session()->has('colores') && count($colores) > 0)
        <h2>Colores introducidos:</h2>
        <ul>
            @foreach ($colores as $color)
                <li>{{ $color }}</li>
            @endforeach
        </ul>
    @else
        <p>No has agregado ningún color todavía.</p>
    @endif

    <form action="{{ route('eliminarColores') }}" method="POST">
        @csrf
        <button type="submit">Eliminar todos los colores</button>
    </form>

</body>
</html>
