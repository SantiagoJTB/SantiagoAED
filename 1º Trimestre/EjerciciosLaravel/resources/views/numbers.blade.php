<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Números Aleatorios</title>
</head>
<body>
    <h1>Números Aleatorios</h1>

    <h2>Números menores de 50:</h2>
    <ul>
        @foreach ($numbers as $number)
            @if ($number < 50)
                <li>{{ $number }}</li>
            @endif
        @endforeach
    </ul>

    <h2>Números mayores o iguales a 50:</h2>
    <ul>
        @foreach ($numbers as $number)
            @if ($number >= 50)
                <li>{{ $number }}</li>
            @endif
        @endforeach
    </ul>
</body>
</html>
