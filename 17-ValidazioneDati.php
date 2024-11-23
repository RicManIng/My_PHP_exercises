<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validare i dati</title>
</head>
<body>
    <h1>Validare i dati</h1>

    <h2>Validare e-mail</h2>
    <code>
        filter_var($elemento, TIPO_FILTRO, $opzioni)
    </code>
    <p>
        <?php
            $elemento = "ciao@mail.it";
            echo("<br> Il mio elemento <strong>" . $elemento . "</strong>");
            if(filter_var($elemento, FILTER_VALIDATE_EMAIL)){
                echo("è valido <br>");
            } else {
                echo("non è valido <br>");
            }
        ?>
    </p>
</body>
</html>