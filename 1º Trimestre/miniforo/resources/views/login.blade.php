<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini Foro</title>
        <style>
            body{
                text-align: center;
                background-color: antiquewhite;
            }
        </style>
    </head>
    <?php
        session_start();
        if (isset($_POST["nick"])) {
        $nick = $_POST["nick"];

        file_put_contents("nicks.txt", $nick . "\n", FILE_APPEND);
        }

    ?>
    <body class="antialiased">
        <h1>Introduce tu nick:</h1>
        <form action="inicio">
        <input type="text" name="nick">
        <input type="submit" value="Enviar">
        </form>
    </body>
</html>
