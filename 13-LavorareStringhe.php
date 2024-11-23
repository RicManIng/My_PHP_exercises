<?php
$titolo = "Lavorare con le stringhe";
$testo = "Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titolo?></title>
</head>
<body>
    <h1><?php echo $titolo?></h1>
    <p><?php echo $testo?></p>
    <hr>
    <h2>Lunghezza stringa</h2>
    <code>strlen("stringa")</code>
    <p>Il testo è lungo <strong><?php echo strlen($testo); ?></strong> caratteri.</p>
    <hr>
    <h2>Porzione di stringa</h2>
    <code>substr("stringa", posizione, lunghezza)</code>
    <p>La porzione richiesta è : <?php echo substr($testo, 0, 20); ?>...</p>
    <hr>
    <h2>Cerca porzione di stringa</h2>
    <code>strpos("stringa", "da cercare")</code>
    <p>La porzione cercata è in posizione : <?php echo strpos($testo, "consectetur adipiscing");?> </p>
    <hr>
    <h2>Sostituire porzione di stringa</h2>
    <code>str_replace("da cercare", "sostituire con", "stringa")</code>
    <p>La stringa ora è : <?php echo str_replace("Lorem ipsum", "Sono Pippo", $testo);?> </p>
    <hr>
    <h2>Tutto in maiuscolo</h2>
    <code>strtoupper("stringa")</code>
    <p>La stringa ora è : <?php echo strtoupper($testo);?> </p>
    <hr>
    <h2>Concatenare le stringhe</h2>
    <code>sprintf("stringa", valori)</code>
    <p>
        <?php
        $nome = "Pippo";
        $cognome = "Baudo";
        $eta = 50;
        echo sprintf("Mi chiamo %s %s e ho %d anni.", $nome, $cognome, $eta);
        ?>
    </p>
    <hr>
    <h2>Concatenare le stringhe stampandole direttamente</h2>
    <code>printf("stringa", valori)</code>
    <p>
        <?php
        $nome = "Pippo";
        $cognome = "Baudo";
        $eta = 50;
        printf("Mi chiamo %s %s e ho %d anni.", $nome, $cognome, $eta);
        ?>
    </p>
    <hr>
    <h2>Confronto le stringhe</h2>
    <code>$str = "ciao" <br>
    if($str == "ciao") // true <br>
    if($str == "Ciao") // false <br>
    </code>
    <p>
        Il PHP è case sensitive, quindi "ciao" è diverso da "Ciao".
    </p>
    <hr>
    <h2>Confronto le stringhe secondo sistema</h2>
    <code>strcmp("stringa1", "stringa2")</code>
    <p>
        <?php
        $str1 = "ciao";
        $str2 = "Ciao";
        if(strcmp($str1, $str2) == 0){
            echo "Le stringhe sono uguali";
        }else if(strcmp($str1, $str2) < 0){
            echo "La prima stringa è minore della seconda";
        }else{
            echo "La prima stringa è maggiore della seconda";
        }
        ?>
    </p>
    <hr>
    <h2>Confronto le stringhe secondo sistema senza case sensitive</h2>
    <code>strcasecmp("stringa1", "stringa2")</code>
    <p>
        <?php
        $str1 = "ciao";
        $str2 = "Ciao";
        if(strcasecmp($str1, $str2) == 0){
            echo "Le stringhe sono uguali";
        }else if(strcasecmp($str1, $str2) < 0){
            echo "La prima stringa è minore della seconda";
        }else{
            echo "La prima stringa è maggiore della seconda";
        }
        ?>
    </p>
</body>
</html>