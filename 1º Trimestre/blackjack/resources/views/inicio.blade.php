<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9;display: inline;
            text-align: center; align-items: center; height: 100vh; margin: 0;}
        h1 { color: #333;}
        form { background-color: white; padding: 20px; border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);}
        input[type="text"] { padding: 10px; border: 1px solid #ddd;
            border-radius: 4px; margin-right: 10px;}
        button { padding: 10px 20px; margin-top: 1em; background-color: #4CAF50; color:white; border: none;
            border-radius: 4px;cursor: pointer; transition: background-color 0.3s;}
        button:hover {background-color: #45a049;}
    </style>
</head>
<body>
    <h1>BlackJack 21</h1>
    <p>Introduce un nombre de usuario:</p>
    <form action="/partida" method="post">
        @csrf
        <input type="text" name="nombreJugador" required/></br>
        <button type="submit" name="enviarNombreJugador">Iniciar Juego</button>
    </form>
</body>
</html>
