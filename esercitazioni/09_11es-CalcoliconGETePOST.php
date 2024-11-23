<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcoli con GET</title>
</head>
<body>
    <h1>Calcoli con GET</h1>

    <h2>Calcolare l'area</h2>
    <form action="09es-CalcoliconGET.php" method="get">
        <input type="hidden" name="funzione" value="Area">
        <label for="altezza_area">inserire l'altezza</label> <br>    
        <input type="number" name="altezza" id="altezza_area" required> <br>
        <label for="larghezza_area">inserire la larghezza</label> <br>
        <input type="number" name="larghezza" id="larghezza_area" required> <br> <br>
        <button type="submit">Calcola</button>
    </form>
    <p>
    <?php
        if (isset($_GET['funzione']) && $_GET['funzione'] == 'Area') {
            if (isset($_GET['altezza'], $_GET['larghezza'])) {
                $altezza = $_GET['altezza'];
                $larghezza = $_GET['larghezza'];
                
                if (is_numeric($altezza) && is_numeric($larghezza)) {
                    $risultato = $altezza * $larghezza;
                    echo "Il risultato è: " . $risultato;
                } else {
                    echo "Errore: 'altezza' e 'larghezza' devono essere numeri.";
                }
            } else {
                echo "Errore: 'altezza' e 'larghezza' non sono stati forniti.";
            }
        } else {
            echo "Inserisci i valori per calcolare l'area.";
        }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h2>Calcolare il Perimetro</h2>
    <form action="09es-CalcoliconGET.php" method="get">
        <input type="hidden" name="funzione" value="Perimetro">
        <label for="altezza_area">inserire l'altezza</label> <br>   
        <input type="number" name="altezza" id="altezza_area" required> <br>
        <label for="larghezza_area">inserire la larghezza</label> <br>
        <input type="number" name="larghezza" id="larghezza_area" required> <br> <br>
        <button type="submit">Calcola</button>
    </form>
    <p>
    <?php
        if (isset($_GET['funzione']) && $_GET['funzione'] == 'Perimetro') {
            if (isset($_GET['altezza'], $_GET['larghezza'])) {
                $altezza = $_GET['altezza'];
                $larghezza = $_GET['larghezza'];
                
                if (is_numeric($altezza) && is_numeric($larghezza)) {
                    $risultato = 2*$altezza + 2*$larghezza;
                    echo "Il risultato è: " . $risultato;
                } else {
                    echo "Errore: 'altezza' e 'larghezza' devono essere numeri.";
                }
            } else {
                echo "Errore: 'altezza' e 'larghezza' non sono stati forniti.";
            }
        } else {
            echo "Inserisci i valori per calcolare l'area.";
        }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h2>Calcolare Area Perimetro Condizionale</h2>
    <form action="09es-CalcoliconGET.php" method="get">
        <select name="funzione" id="scelta_funzione">
            <option value="CondArea">Area</option>
            <option value="CondPerimetro">Perimetro</option>
        </select> <br><br>
        <label for="altezza_area">inserire l'altezza</label> <br>   
        <input type="number" name="altezza" id="altezza_area" required> <br>
        <label for="larghezza_area">inserire la larghezza</label> <br>
        <input type="number" name="larghezza" id="larghezza_area" required> <br> <br>
        <button type="submit">Calcola</button>
    </form>
    <p>
    <?php
        if (isset($_GET['funzione']) && $_GET['funzione'] == 'CondPerimetro') {
            if (isset($_GET['altezza'], $_GET['larghezza'])) {
                $altezza = $_GET['altezza'];
                $larghezza = $_GET['larghezza'];
                
                if (is_numeric($altezza) && is_numeric($larghezza)) {
                    $risultato = 2*$altezza + 2*$larghezza;
                    echo "Il risultato è: " . $risultato;
                } else {
                    echo "Errore: 'altezza' e 'larghezza' devono essere numeri.";
                }
            } else {
                echo "Errore: 'altezza' e 'larghezza' non sono stati forniti.";
            }
        } elseif (isset($_GET['funzione']) && $_GET['funzione'] == 'CondArea') {
            if (isset($_GET['altezza'], $_GET['larghezza'])) {
                $altezza = $_GET['altezza'];
                $larghezza = $_GET['larghezza'];
                
                if (is_numeric($altezza) && is_numeric($larghezza)) {
                    $risultato = $altezza * $larghezza;
                    echo "Il risultato è: " . $risultato;
                } else {
                    echo "Errore: 'altezza' e 'larghezza' devono essere numeri.";
                }
            } else {
                echo "Errore: 'altezza' e 'larghezza' non sono stati forniti.";
            }
        } else {
            echo "Inserisci i valori per calcolare l'area.";
        }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h1>Calcoli con POST</h1>

    <h2>Pari o Dispari</h2>
    <?php
        session_start(); // Necessary to start or resume a session
        if (!isset($_SESSION['PariDispariArr'])) {
            $_SESSION['PariDispariArr'] = [];
        }
        $PariDispariArr = &$_SESSION['PariDispariArr']; // con questo creo un riferimento all'array della sessione così ogni modifica sarà riportata anche sull'array originale
    ?>
    <form action="" method="post">
        <label for="valore">inserire un numero</label> <br>   
        <input type="number" name="valore" id="valore"> <br>
        <button type="submit" name="ParDirFun" value="Calcola">Calcola</button>
        <button type="submit" name="ParDirFun" value="Aggiungi">Aggiungi</button>
    </form>
    <p>
        <?php
            if (isset($_POST['ParDirFun']) && $_POST['ParDirFun'] == 'Calcola'){
                if(count($PariDispariArr) > 0){
                    foreach($PariDispariArr as $value){
                        echo(($value&1) ? "il valore $value è dispari<br>" : "il valore $value è pari<br>"); // vero
                    }
                }
            } elseif (isset($_POST['ParDirFun']) && $_POST['ParDirFun'] == 'Aggiungi'){
                array_push($PariDispariArr, $_POST['valore']);
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($PariDispariArr);
            } else {
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($PariDispariArr);
            }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h2>Calcolo Somma da 0 a N</h2>
    <form action="" method="post">
        <label for="valore_somma_0N">inserire un numero</label> <br>   
        <input type="number" name="valore_somma_0N" id="valore_somma_0N"> <br>
        <button type="submit">Calcola</button>
    </form>
    <p>
        <?php
            if (isset($_POST['valore_somma_0N'])){
                $somma = 0;
                for ($i = 0; $i <= $_POST['valore_somma_0N']; $i++){
                    $somma += $i;
                }
                echo "la somma da 0 a N vale $somma <br>";
            } else {
                echo"Inserisci un valore <br>";
            }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h2>Calcolo Somma Dispari da 0 a N</h2>
    <form action="" method="post">
        <label for="valore_somma_dis_0N">inserire un numero</label> <br>   
        <input type="number" name="valore_somma_dis_0N" id="valore_somma_dis_0N"> <br>
        <button type="submit">Calcola</button>
    </form>
    <p>
        <?php
            if (isset($_POST['valore_somma_dis_0N'])){
                $somma = 0;
                for ($i = 0; $i <= $_POST['valore_somma_dis_0N']; $i++){
                    if($i&1){
                        $somma += $i;
                    }
                }
                echo "la somma dei numeri dispari da 0 a N vale $somma <br>";
            } else {
                echo"Inserisci un valore <br>";
            }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h2>Cerca Minimo</h2>

    <?php
        if (!isset($_SESSION['CercaMinimoArr'])) {
            $_SESSION['CercaMinimoArr'] = [];
        }
        $CercaMinimoArr = &$_SESSION['CercaMinimoArr']; // con questo creo un riferimento all'array della sessione così ogni modifica sarà riportata anche sull'array originale
    ?>
    <form action="" method="post">
        <label for="valore">inserire un numero</label> <br>   
        <input type="number" name="valore" id="valore"> <br>
        <button type="submit" name="CercaMinFun" value="Calcola">Calcola</button>
        <button type="submit" name="CercaMinFun" value="Aggiungi">Aggiungi</button>
    </form>
    <p>
        <?php
            if (isset($_POST['CercaMinFun']) && $_POST['CercaMinFun'] == 'Calcola'){
                if(count($CercaMinimoArr) > 0){
                    echo "Il valore minimo nell'array è : " . min($CercaMinimoArr);
                }
            } elseif (isset($_POST['CercaMinFun']) && $_POST['CercaMinFun'] == 'Aggiungi'){
                array_push($CercaMinimoArr, $_POST['valore']);
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($CercaMinimoArr);
            } else {
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($CercaMinimoArr);
            }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h2>Array Sort</h2>

    <?php
        if (!isset($_SESSION['SortArr'])) {
            $_SESSION['SortArr'] = [];
        }
        $SortArr = &$_SESSION['SortArr']; // con questo creo un riferimento all'array della sessione così ogni modifica sarà riportata anche sull'array originale
    ?>
    <form action="" method="post">
        <label for="valore">inserire un numero</label> <br>   
        <input type="number" name="valore" id="valore"> <br>
        <button type="submit" name="SortArrFun" value="Calcola">Calcola</button>
        <button type="submit" name="SortArrFun" value="Aggiungi">Aggiungi</button>
    </form>
    <p>
        <?php
            if (isset($_POST['SortArrFun']) && $_POST['SortArrFun'] == 'Calcola'){
                if(count($SortArr) > 0){
                    echo "Ecco l'array in ordine crescente<br>";
                    sort($SortArr);
                    print_r($SortArr);
                }
            } elseif (isset($_POST['SortArrFun']) && $_POST['SortArrFun'] == 'Aggiungi'){
                array_push($SortArr, $_POST['valore']);
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($SortArr);
            } else {
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($SortArr);
            }
        ?>
    </p>

</body>
</html>