<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Formulario de Usuario</title>
</head>
<body>
    <h1>Formulario de Usuario</h1>

    <!-- Mostrar errores de validación, si los hay -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('usuario.procesarFormulario') }}">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" placeholder="Ingresa tu nombre" value="{{ old('nombre', $usuario['nombre']) }}">
        <br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" placeholder="Ingresa tu edad" value="{{ old('edad', $usuario['edad']) }}">
        <br>

        <label for="gustos">Gustos:</label>
        <input type="text" name="gustos" placeholder="Ingresa tus gustos" value="{{ old('gustos', $usuario['gustos']) }}">
        <br>

        <button type="submit">Enviar</button>
    </form>

    <h2>Información Actual del Usuario:</h2>
    <p><strong>Nombre:</strong> {{ $usuario['nombre'] }}</p>
    <p><strong>Edad:</strong> {{ $usuario['edad'] }}</p>
    <p><strong>Gustos:</strong> {{ $usuario['gustos'] }}</p>
</body>
</html>
