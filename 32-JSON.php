<?php
/**
 * JSON (JavaScript Object Notation) è un formato di scambio dati leggero, facile da leggere e scrivere per gli esseri umani e facile da analizzare e generare per le macchine.
 * 
 * json_encode() - Converte un array in una stringa JSON
 * json_decode() - Converte una stringa JSON in un array
 */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON</title>
</head>
<body>
    <h1>Javascript Object Notation</h1>

    <h2>Conversione in JSON</h2>
    <code>
        $stringa = json_encode($elemento); // converte l'elemento in una stringa JSON
    </code>
    <p>
        <?php
            $elemento = array('nome' => 'Mario', 'cognome' => 'Rossi', 'eta' => 30);
            $stringa = json_encode($elemento);
            echo "<br>$stringa<br>";
        ?>
    </p>

    <hr>

    <h2>Conversione stringa JSON in elemento</h2>
    <code>
        $elemento = json_decode($stringa); // converte la stringa JSON in un elemento
    </code>
    <p>
        <?php
            $elemento = json_decode($stringa);
            print_r($elemento);
            echo ("Estraggo elemento : " . $elemento->nome);
            echo ("<br>Eseguo cast per ottenere array");
            $elemento = (array) $elemento;
            print_r($elemento);
            echo ("Estraggo elemento : " . $elemento['nome']);
        ?>
    </p>
</body>
</html>