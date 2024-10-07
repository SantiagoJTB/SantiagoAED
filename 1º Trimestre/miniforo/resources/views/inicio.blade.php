<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini Foro</title>
        <style>
            body{
                display: flex;
            }
            #principal{
                flex: 2;
                background-color: beige;
            }
            #aside{
                flex: 1;
                background-color: aquamarine;
                text-align: center;
            }
            #nick{
                text-align: right;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="principal"></div>
        <aside id="aside">
            <p id="nick">
                <?php
                if (isset($_GET["nick"])) {
                    echo htmlspecialchars($_GET['nick']);
                }
                ?>
            </p>
            <br>
            <form action=""></form>
                <input type="text" name="asunto" id="asunto">
                <br>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                <br>
                <input type="submit" value="Enviar">
            </form>
        </aside>
    </body>
</html>
