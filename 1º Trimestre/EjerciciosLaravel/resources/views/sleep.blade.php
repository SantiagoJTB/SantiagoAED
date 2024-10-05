<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiempo desde 1970</title>
</head>
<body>
    <h1>Desde el 1-01-1970 han pasado:</h1>

    @for ($i = 0; $i < 3; $i++)
        @php
            $dato = time();
            echo "<p>{$dato} segundos</p>";
            sleep(3);
        @endphp
    @endfor
</body>
</html>
