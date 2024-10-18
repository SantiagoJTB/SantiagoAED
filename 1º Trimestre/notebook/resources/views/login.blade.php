<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Login:</h2>
    <form action="{{route('login.autentification')}}" method="POST">
        @csrf
        <input type="text" name="userName" id="inputUserName" placeholder="Nombre de usuario" required/>
        <br>
        <input type="text" name="userPassword" id="inputUserPassword" placeholder="Contraseña" required/>
        <br>
        <button type="submit" value="Enviar" id="buttonSubmitUser">Entrar</button>
    </form>
    <a href="{{route('registroget')}}">Registrarse</a>
        <p id="mensajeLogin">{{$mensaje ?? ""}}</p>
</body>
</html>
