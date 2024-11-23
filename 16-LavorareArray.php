<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavorare con gli array</title>
</head>
<body>
    <h1>Lavorare con gli array</h1>

    <h2>Dimensione Array</h2>
    <code>
        $mioArray = [1, 2, 3, 4, 5];
        count($mioArray);
    </code>
    <p>
        <?php
            $mioArray = [1, 2, 3, 4, 5];
            echo count($mioArray);
        ?>
    </p>
    <hr>

    <h2>Elemento contenuto in array</h2>
    <code>
        $mioArray = [1, 2, 3, 4, 5];
        in_array(valore, $mioArray);
    </code>
    <p>
        <?php
            $mioArray = [1, 2, 3, 4, 5];
            if(in_array(3, $mioArray)){
                echo "Il valore 3 è contenuto nell'array";
            } else {
                echo "Il valore 3 non è contenuto nell'array";
            }
        ?>
    </p>
    <hr>

    <h2>Unire 2 array</h2>
    <code>
        $mioArray1 = [1, 2, 3];
        $mioArray2 = [4, 5, 6];
        array_merge($mioArray1, $mioArray2);
    </code>
    <p>
        <?php
            $mioArray1 = [1, 2, 3];
            $mioArray2 = [4, 5, 6];
            print_r(array_merge($mioArray1, $mioArray2));
        ?>
    </p>
    <hr>

    <h2>Unire 2 array associativi</h2>
    <code>
        $mioArray1 = ["nome" => "Mario", "cognome" => "Rossi"];
        $mioArray2 = ["eta" => 30, "citta" => "Roma"];
        array_merge($mioArray1, $mioArray2);
    </code>
    <p>
        <?php
            $mioArray1 = ["nome" => "Mario", "cognome" => "Rossi", "eta" => 25];
            $mioArray2 = ["eta" => 30, "citta" => "Roma"];
            print_r(array_merge($mioArray1, $mioArray2));
            echo "la chiave eta è stata sovrascritta";
        ?>
    </p>
    <hr>

    <h2>Estrarre chiavi da un array associativo</h2>
    <code>
        $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "eta" => 30];
        array_keys($mioArray);
    </code>
    <p>
        <?php
            $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "eta" => 30];
            print_r(array_keys($mioArray));
        ?>
    </p>
    <hr>

    <h2>Inserire elemento in Array</h2>
    <code>
        $mioArray = [1, 2, 3, 4, 5];
        array_push($mioArray, 6);
    </code>
    <p>
        <?php
            $mioArray = [1, 2, 3, 4, 5];
            echo "Array originale: ";
            print_r($mioArray);
            array_push($mioArray, 6);
            echo "<br>Array modificato: ";
            print_r($mioArray);
        ?>
    </p>
    <hr>

    <h2>Eseguire operazione su ogni elemento dell'array</h2>
    <code>
        $mioArray = [1, 2, 3, 4, 5];
        array_map("funzione", $mioArray);
    </code>
    <p>
        <?php
            $mioArray = [1, 2, 3, 4, 5];
            function raddoppia($valore){
                return $valore * 2;
            }
            print_r(array_map("raddoppia", $mioArray));
        ?>
    </p>
</body>
</html>