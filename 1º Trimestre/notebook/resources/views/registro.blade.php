<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="registro.autentification" method="POST">
        <input type="text" name="userNameRegistro" required/>
        <input type="text" name="userPasswordRegistro" required/>
        <input type="text" name="userPasswordConfirmation" required/>
        <input type="submit" value="Enviar"/>
    </form>
    <a href="1º Trimestre/notebook/resources/views/login.blade.php">Volver a login</a>
    <p>{{'mensaje'}}</p>

</body>
</html>
