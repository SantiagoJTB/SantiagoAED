<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Registro:</h2>
    <form action="{{route('registro.autentification')}}" method="POST">
        @csrf
        <input type="text" name="userNameRegistro" placeholder="Nombre usuario" required/>
        <br>
        <input type="text" name="userPasswordRegistro" placeholder="Contraseña" required/>
        <br>
        <input type="text" name="userPasswordConfirmacion" placeholder="Confirmar contraseña" required/>
        <br>
        <input type="submit" value="Enviar"/>
    </form>
    <a href="{{route('loginget')}}">Volver a login</a>
    <p id="mensajeRegistro">{{$mensaje ?? ""}}</p>

</body>
</html>
