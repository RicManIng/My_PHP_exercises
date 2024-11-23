<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    <h1>Gli Array</h1>

    <h2>Array vuoto</h2>
    <code>
        $mioArray = array();
        $mioArray = [];
    </code>
    <p>
        <?php
            $mioArray = [];
            print_r($mioArray);
        ?>
    </p>
    <hr>

    <h2>Array con valori</h2>
    <code>
        $mioArray = array(1, 2, 3, 4, 5);
        $mioArray = [1, 2, 3, 4, 5];
    </code>
    <p>
        <?php
            $mioArray = [1, 2, 3, 4, 5];
            print_r($mioArray);
        ?>
    </p>
    <hr>

    <h2>Selezionare un valore dell'array</h2>
    <code>
        $mioArray = [1, 2, 3, 4, 5];
        echo $mioArray[indice];
    </code>
    <p>
        <?php
            $mioArray = [1, 2, 3, 4, 5];
            echo $mioArray[2];
        ?>
    </p>
    <hr>

    <h2>Cambiare un valore dell'array</h2>
    <code>
        $mioArray = [1, 2, 3, 4, 5];
        $mioArray[indice] = valore;
    </code>
    <p>
        <?php
            $mioArray = [1, 2, 3, 4, 5];
            echo "Array originale: ";
            print_r($mioArray);
            $mioArray[2] = 10;
            echo "<br>Array modificato: ";
            print_r($mioArray);
        ?>
    </p>
    <hr>

    <h2>Array associativo con valori</h2>
    <code>
        $mioArray = array("nome" => "Mario", "cognome" => "Rossi", "età" => 30);
        $mioArray = ["chiave" => "valore", "chiave" => "valore", "chiave" => valore];
    </code>
    <p>
        <?php
            $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "età" => 30];
            print_r($mioArray);
        ?>
    </p>
    <hr>

    <h2>Selezionare un valore dell'array associativo</h2>
    <code>
        $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "età" => 30];
        echo $mioArray["chiave"];
    </code>
    <p>
        <?php
            $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "età" => 30];
            echo $mioArray["cognome"];
        ?>
    </p>
    <hr>

    <h2>Cambiare un valore dell'array associativo</h2>
    <code>
        $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "età" => 30];
        $mioArray["chiave"] = valore;
    </code>
    <p>
        <?php
            $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "età" => 30];
            echo "Array originale: ";
            print_r($mioArray);
            $mioArray["età"] = 35;
            echo "<br>Array modificato: ";
            print_r($mioArray);
        ?>
    </p>
    <hr>

    <h2>Array multidimensionale</h2>
    <code>
        $mioArray = array(
            array(1, 2, 3),
            array(4, 5, 6),
            array(7, 8, 9)
        );
        $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "capelli" => ["castani", "lunghi"]];
    </code>
    <p>
        <?php
            $mioArray = array(
                array(1, 2, 3),
                array(4, 5, 6),
                array(7, 8, 9)
            );
            print_r($mioArray);
            $mioArray = ["nome" => "Mario", "cognome" => "Rossi", "capelli" => ["castani", "lunghi"]];
            print_r($mioArray);
        ?>
    </p>
    <hr>
</body>
</html>