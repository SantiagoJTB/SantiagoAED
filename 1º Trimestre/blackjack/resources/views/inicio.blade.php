<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body>
    <h1>BlackJack 21</h1>
    <h1>El ganador ha sido: {{$partida->ganador->getNombre()}}</h1>
    <p>Introduce un nombre de usuario:</p>
    <form action="/partida" method="post">
        @csrf
        <input type="text" name="nombreJugador" required/>
        <button type="submit" name="enviarNombreJugador">Iniciar Juego</button>
    </form>
</body>
</html>
