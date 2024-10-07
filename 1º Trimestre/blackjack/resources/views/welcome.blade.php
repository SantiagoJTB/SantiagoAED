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
        <input type="submit" name="Enviar" value="Enviar">
    </form>
    <div id="lista">
        @if(isset($mazo))
            @foreach($mazo as $carta)
                <div>{{ $carta->getValor() }} {{ $carta->getTipo() }}</div>
            @endforeach
        @else
            <div>No hay cartas disponibles.</div>
        @endif
    </div>
</body>
</html>
