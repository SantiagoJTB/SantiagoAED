<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="nick" required placeholder="Introduce tu nick">
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
