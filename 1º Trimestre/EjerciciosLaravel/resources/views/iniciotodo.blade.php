<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <style>
        body { display: flex; flex-direction: column; align-items: center; }
        #form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Tareas de {{ session('nick') }}</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="Cerrar Sesión">
    </form>

    <div id="form">
        <h1>Crear Tarea</h1>
        <form action="" method="POST">
            @csrf
            <input type="text" name="tarea" required placeholder="Introduce una tarea">
            <br>
            <textarea name="descripcion" rows="5" cols="40" required placeholder="Introduce una descripción"></textarea>
            <br>
            <input type="submit" value="Crear Tarea">
        </form>
    </div>

    <div id="lista">
        <h1>Lista de Tareas</h1>
        <ul>
            @foreach ($tareas as $indice => $tarea)
                <li>
                    {{ htmlspecialchars($tarea['tarea']) }} - {{ htmlspecialchars($tarea['descripcion']) }}
                    <form method="POST" action="">
                        @csrf
                        <input type="hidden" name="eliminar" value="{{ $indice }}">
                        <input type="submit" value="Eliminar">
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
