<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Números Primos</title>
</head>
<body class="antialiased">
    <h1>Son las: {{ date('H:i') }} del día: {{ date('d-m-Y') }}</h1>
    <h1>Números Primos</h1>
    @foreach ($coleccion as $primo)
        <p>Primo: {{ $primo }}</p>
    @endforeach
</body>
</html>
