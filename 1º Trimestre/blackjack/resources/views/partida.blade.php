<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Partida</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px; }
        div { text-align: center; }
        h1, p { color: #333; }
        ul { list-style: none; padding: 0; }
        ul li { padding: 5px 0; font-weight: bold; }
        #container { display: flex; justify-content: space-around; margin-bottom: 20px; }
        #jugador, #crupier { background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 45%; }
        button { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; margin: 5px; transition: background-color 0.3s; }
        button:hover { background-color: #45a049; }
        h1 { color: #000000; }
    </style>
</head>
<body>
    <div id="container">
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
    <div>
        <form action="{{route('juego')}}" method="post" id="form">
            @csrf
            <button type="submit" name="action" value="pedirCarta">Pedir Carta</button>
            <button type="submit" name="action" value="plantarse">Plantarse</button>
            <button type="submit" name="action" value="reiniciar">Nueva Partida</button>
            <h1>{{session()->get('mensaje')}}</h1>
        </form>
    </div>
</body>
</html>
