<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * Timestamp indica il numero di secondi trascorsi dal 1 gennaio 1970
     * all'istante della chiamata della funzione.
     * Si fa riferimento alla data del server.
     */
    ?>
    <h2>Timestamp o Unix Time</h2>
    <code>time();</code>
    <p>Il timestamp attuale è : <?php echo time(); ?></p>
    <hr>
    <?php
    /**
     * La funzione date() permette di formattare la data.
     * d -> giorno (con lo 0 iniziale)
     * m -> mese
     * Y -> anno a 4 cifre
     * H -> ore
     * i -> minuti
     * s -> secondi
     * D -> primi tre caratteri del giorno della settimana
     * j -> giorno senza lo 0 iniziale
     * M -> primo tre caratteri del mese
     * F -> nome completo del mese
     * y -> anno a due cifre
     */
    ?>

    <h2>Formattare la data</h2>
    <code>date("stringa", data);</code>
    <p>
        La data attuale è : <?php echo date("d/m/Y H:i:s"); ?>
    </p>
    <hr>
    <?php
    /**
     * strtotime() permette di convertire una stringa in timestamp.
     */
    ?>
    <h2>Convertire una stringa in timestamp</h2>
    <code>strtotime("stringa");</code>
    <p>
        La data attuale è : <?php echo date("d/m/Y H:i:s", strtotime("now")); ?>
        Il timestamp del 21 marzo 2021 è : <?php echo strtotime("21 March 2021"); ?>
        Il timestamp di un mese fa è : <?php echo strtotime("-1 month"); ?>
    </p>
    <hr>
    <?php
    /**
     * DateTime() è una classe che permette di manipolare le date.
     */
    ?>
    <h2>Manipolare le date con DateTime()</h2>
    <code>$data = new DateTime();</code>
    <p>
        La data attuale è : 
        <?php 
            $data = new DateTime(); 
            echo $data->format("d/m/Y H:i:s"); 
        ?>

        <br>

        La data di un mese fa è :
        <?php 
            $data->modify("-1 month");
            echo $data->format("d/m/Y H:i:s");
        ?>

        <br>

        Tra 1 anno e 47 giorni sarà :
        <?php 
            $data->modify("+1 year +47 days");
            echo $data->format("d/m/Y H:i:s");
        ?>
        
    </p>
</body>
</html>