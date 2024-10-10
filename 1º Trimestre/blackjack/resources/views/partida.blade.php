<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Partida</title>

</head>
<body>
    <div id="container">
        <h1>{{session()->get('mensaje')}}</h1>
        <div id="jugador">
        <p>Jugador: {{ $partida->jugador->getNombre() }}</p>
        <p>Cartas de {{$partida->jugador->getNombre()}}:</p>
        <ul>
            @foreach ($partida->jugador->mano->getCartas() as $carta)
                <li>{{ $carta->getTipo() }} ({{ $carta->getValor() }})</li>
            @endforeach
        </ul>
            <p>Puntuacion: {{$partida->jugador->mano->getPuntuacion()}}</p>
        </div>
        <div id="crupier">
            <p>Crupier: {{ $partida->crupier->getNombre() }}</p>
        <p>Cartas de {{$partida->crupier->getNombre()}}:</p>
        <ul>
            @foreach ($partida->crupier->mano->getCartas() as $carta)
                <li>{{ $carta->getTipo() }} ({{ $carta->getValor() }})</li>
            @endforeach
        </ul>
            <p>Puntuacion: {{$partida->crupier->mano->getPuntuacion()}}</p>
        </div>
    </div>
    <form action="{{route('juego')}}" method="post" id="form">
        @csrf
        <button type="submit" name="action" value="pedirCarta">Pedir Carta</button>
        <button type="submit" name="action" value="plantarse">Plantarse</button>
        <button type="submit" name="action" value="reiniciar">Nueva Partida</button>

    </form>
</body>
</html>
