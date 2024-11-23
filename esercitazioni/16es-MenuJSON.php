<?php
    ini_set('auto_detect_line_endings', TRUE);

    $file = "16es-menuLaterale.json";
    $arrJSON = [];
    //apro il file csv e lo leggo
    if(!$fp = fopen($file, "r")){
        echo "Errore nell'apertura del file";
    } else {
        if(is_readable($file)){
            $file_letto = fread($fp, filesize($file));  
            $arrJSON = json_decode($file_letto, true);  //il true serve per trasformare l'oggetto in un array associativo          
        } else {
            echo "Il file non è leggibile";
        }
        
    }
    fclose($fp);

    /* print_r($arrJSON);
    echo "<br>";
    print_r($arrJSON[0]);
    echo "<br>";
    echo "Il tipo dato è: " . gettype($arrJSON[0]); */


    //controllo se esiste una richiesta HTTP

    if(isset($_GET['selezionato'])){
        $selezione = $_GET['selezionato'];
    } elseif(isset($_POST['selezionato'])){
        $selezione = $_POST['selezionato'];
    } else {
        $selezione = 1;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Menu JSON</title>
</head>
<body>
    <h1>Menu creato da JSON</h1>
    <ul>
        <?php
            foreach($arrJSON as $link){
                $n = $link['id'];
                $testo = $link['nome'];
                $file = $link['link'];
                $title = $link['title'];

                if($n == $selezione){
                    echo "<li><a href='$file?selezionato=$n' title='$title'><strong>$testo</strong></a></li>";
                } else {
                    echo "<li><a href='$file?selezionato=$n' title='$title'>$testo</a></li>";
                }
            }
        ?>
    </ul>
</body>
</html>