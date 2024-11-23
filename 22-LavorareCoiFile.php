<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavorare con i file</title>
</head>
<body>
    <h1>Lavorare con i file</h1>
    
    <h2>Controllare se file o directory esistono</h2>
    <code>
        file_exists("path")<br>
    </code>
    <p>
        <?php
            $file = "file.txt";
            if(file_exists($file)){
                echo "Il file $file esiste";
            }else{
                echo "Il file $file non esiste";
            }
        ?>
    </p>
    <hr>

    <h2>Controlla se il path è un file</h2>
    <code>
        is_file("path")<br>
    </code>
    <p>
        <?php
            $file = "file.txt";
            if(is_file($file)){
                echo "Il path $file è un file";
            }else{
                echo "Il path $file non è un file";
            }
        ?>
    </p>
    <hr>

    <h2>Dimensione file</h2>
    <code>
        filesize("path")<br>
    </code>
    <p>
        <?php
            $file = "file.txt";
            echo "La dimensione del file $file è: " . filesize($file) . " byte";
        ?>
    </p>
    <hr>

    <h2>Leggere contenuto file</h2>
    <code>
        $stringa = file_get_contents("path", false, null, $inizio, $lunghezza)<br>
    </code>
    <p>
        <?php
            $file = "file.txt";
            if(file_exists($file)){
                if(is_file($file)){
                    $stringa = file_get_contents($file);
                    echo "Il contenuto del file è : $stringa";
                }else{
                    echo "Il path $file non è un file";
                }
            }else{
                echo "Il file $file non esiste";
            }
        ?>
    </p>
    <hr>

    <h2>Scrivere su file</h2>
    <code>
        $stringa = file_put_contents("path", $dati, $opzioni)<br>
    </code>
    <p>
        <?php
            $file = "file.txt";
            $dati = "Ciao mondo!";
            $scrittura = file_put_contents($file, $dati);
            if($scrittura){
                echo "Scrittura avvenuta con successo";
            }else{
                echo "Errore nella scrittura";
            }
        ?>
    </p>
    <hr>

    <h2>Creare un file</h2>
    <code>
        $risorsa = fopen("path", "w")<br>
        fwrite($risorsa, $dati)<br>
        fclose($risorsa)<br>
    </code>
    <p>
        <?php
            $file = "file.txt";
            $dati = "Ciao mondo!";
            $risorsa = fopen($file, "w");
            fwrite($risorsa, $dati);
            fclose($risorsa);
            echo "File creato con successo";
        ?>
    </p>
    <hr>

    <h2>Eliminare un file</h2>
    <code>
        unlink("path")<br>
    </code>
    <p>
        <?php
            $file = "file.txt";
            if(file_exists($file)){
                unlink($file);
                echo "File eliminato con successo";
            }else{
                echo "Il file $file non esiste";
            }
        ?>
    </p>
    <hr>
</body>
</html>