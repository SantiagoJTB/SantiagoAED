<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body class="container">
    <form method="POST" action="{{url('partida')}}">
        @csrf
        <input type="text" name="nombreJugador" required>
        <input type="submit" name="Enviar" value="Enviar" placeholder="Iniciar Partida">
        @if (isset($error))
            <p style="color: red;">{{ $error }}</p>
        @endif
    </form>
</body>
</html>
