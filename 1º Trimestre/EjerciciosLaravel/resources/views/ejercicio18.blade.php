<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Contacto</title>
</head>
<body>
    <h1>Añadir Contacto</h1>

    @if (session('mensaje'))
        <div style="color: green;">{{ session('mensaje') }}</div>
    @endif

    <form action="{{ route('crearFichero') }}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <button type="submit">Añadir</button>
    </form>

    <h2>Contactos</h2>
    <a href="{{ route('listarFicheros') }}">Ver contactos</a>
</body>
</html>
