<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div id = divCrupier>
        <p>{{session('manoCrupier')}}</p>

    </div>
    <div id= divJugador>
        <p>{{session('manoJugador')}}</p>

        <form action="{{url('partida')}}" method="POST">
            <p style="color: rgb(0, 0, 0);">{{session('nombreJugador')}}</p>
            <button type="submit" name='pedirCarta' >Pedir Carta</button>
            <button type="submit" name = 'plantarse'>Plantarse</button>
        </form>
    </div>

</body>
</html>
