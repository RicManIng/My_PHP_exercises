<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <h1>I cookies</h1>

    <h2>Settare un cookie</h2>
    <code>
        setcookie("chiave", "valore", $scadenza, $opzioni);
    </code>
    <p>
        <?php
        $chiave = "UserID";
        $valore = "10";
        $scadenza = strtotime("+1 day")
        setcookie($chiave, $valore, $scadenza);
        echo("ho settato un cookie che ha chiave $chiave con valore $valore e che scadrà $scadenza");

        ?>
    </p>
    <hr>

    <h2>Recuperare un cookie</h2>
    <code>
        $variabile = $_COOKIE[$chiave];
    </code>
    <p>
        <?php
        $a = $_COOKIE[$chiave];
        echo("il mio userID è $a<br>");
        ?>
    </p>
    <hr>

    <h2>Eliminare un Cookie</h2>
    <code>
        unset($_COOKIE["chiave"]);
    </code>
    <p>
        <?php
        unset($_COOKIE[$chiave]);
        ?>
    </p>
</body>
</html>