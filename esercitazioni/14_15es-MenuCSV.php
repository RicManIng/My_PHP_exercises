<?php
    ini_set('auto_detect_line_endings', TRUE);

    $file = "14_15es-menuLaterale.csv";
    $arrCSV = [];

    //apro il file csv e lo leggo
    $riga = 0;
    if(!$fp = fopen($file, "r")){
        echo "Errore nell'apertura del file";
    } else {
        if(is_readable($file)){
            while($data = fgetcsv($fp, null, ";")){
                $arrCSV[$riga] = $data;
                $riga++;
            }
            
        } else {
            echo "Il file non è leggibile";
        }
        
    }
    fclose($fp);


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
    <title>Visualizza Menu CSV</title>
</head>
<body>
    <h1>Menu creato da CSV</h1>
    <ul>
        <?php
            foreach($arrCSV as $link){
                $n = $link[0];
                $testo = $link[1];
                $file = $link[2];
                $title = $link[3];

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