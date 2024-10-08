<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body class="container">
    <form method="POST" action="{{ route('cartas.generar') }}">
        @csrf
        <input type="text" name="nombreJugador">
        <input type="submit" name="Enviar" value="Enviar" placeholder="Iniciar Partida">
    </form>
</body>
</html>
