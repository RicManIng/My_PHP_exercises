<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcoli con GET</title>
</head>
<body>
    <?php
        require_once "10es-ClassiCalcoli_class.php";
        $restart_flag = false;
        if($restart_flag){
            session_start();
            session_destroy();
            $restart_flag = false;

        }
        session_start();
        if(!isset($_SESSION['CalcolatoreClass'])){
            $calcolatrice = new Calcolatrice(); 
            $_SESSION['CalcolatoreClass'] = $calcolatrice;
        } else {
            $calcolatrice = $_SESSION['CalcolatoreClass'];
        }
    ?>
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
                $calcolatrice->set_altezza($_GET['altezza']);
                $calcolatrice->set_larghezza($_GET['larghezza']);
                echo "Il risultato è: " . $calcolatrice->calcolaArea();
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
                $calcolatrice->set_altezza($_GET['altezza']);
                $calcolatrice->set_larghezza($_GET['larghezza']);
                echo "Il risultato è: " . $calcolatrice->calcolaPerimetro();
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
                $calcolatrice->set_altezza($_GET['altezza']);
                $calcolatrice->set_larghezza($_GET['larghezza']);
                echo "Il risultato è: " . $calcolatrice->calcolaPerimetro();
            } else {
                echo "Errore: 'altezza' e 'larghezza' non sono stati forniti.";
            }
        } elseif (isset($_GET['funzione']) && $_GET['funzione'] == 'CondArea') {
            if (isset($_GET['altezza'], $_GET['larghezza'])) {
                $calcolatrice->set_altezza($_GET['altezza']);
                $calcolatrice->set_larghezza($_GET['larghezza']);
                echo "Il risultato è: " . $calcolatrice->calcolaArea();
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
    <form action="" method="post">
        <label for="valore">inserire un numero</label> <br>   
        <input type="number" name="valore" id="valore"> <br>
        <button type="submit" name="ParDirFun" value="Calcola">Calcola</button>
        <button type="submit" name="ParDirFun" value="Aggiungi">Aggiungi</button>
    </form>
    <p>
        <?php
            if (isset($_POST['ParDirFun']) && $_POST['ParDirFun'] == 'Calcola'){
                if(count($calcolatrice->getArray()) > 0){
                    foreach($$calcolatrice->getArray() as $value){
                        echo(($value&1) ? "il valore $value è dispari<br>" : "il valore $value è pari<br>"); // vero
                    }
                }
            } elseif (isset($_POST['ParDirFun']) && $_POST['ParDirFun'] == 'Aggiungi'){
                $tempArr = $calcolatrice->getArray();
                array_push($tempArr, $_POST['valore']);
                $calcolatrice->set_array($tempArr);
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($tempArr);
            } else {
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($calcolatrice->getArray());
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
                $calcolatrice->set_naturale($_POST['valore_somma_0N']);
                $temp = $calcolatrice->somma0N();
                echo "la somma da 0 a N vale : $temp<br>";
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
                $calcolatrice->set_naturale($_POST['valore_somma_dis_0N']);
                $somma = $calcolatrice->sommadispari0N();
                echo "la somma dei numeri dispari da 0 a N vale $somma <br>";
            } else {
                echo"Inserisci un valore <br>";
            }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h2>Cerca Minimo</h2>
    <form action="" method="post">
        <label for="valore">inserire un numero</label> <br>   
        <input type="number" name="valore" id="valore"> <br>
        <button type="submit" name="CercaMinFun" value="Calcola">Calcola</button>
        <button type="submit" name="CercaMinFun" value="Aggiungi">Aggiungi</button>
    </form>
    <p>
        <?php
            if (isset($_POST['CercaMinFun']) && $_POST['CercaMinFun'] == 'Calcola'){
                if(count($calcolatrice->getArray()) > 0){
                    echo "Il valore minimo nell'array è : " . min($calcolatrice->getArray());
                }
            } elseif (isset($_POST['CercaMinFun']) && $_POST['CercaMinFun'] == 'Aggiungi'){
                $tempArr = $calcolatrice->getArray();
                array_push($tempArr, $_POST['valore']);
                $calcolatrice->set_array($tempArr);
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($tempArr);
            } else {
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($calcolatrice->getArray());
            }
        ?>
    </p>

    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <h2>Array Sort</h2>
    <form action="" method="post">
        <label for="valore">inserire un numero</label> <br>   
        <input type="number" name="valore" id="valore"> <br>
        <button type="submit" name="SortArrFun" value="Calcola">Calcola</button>
        <button type="submit" name="SortArrFun" value="Aggiungi">Aggiungi</button>
    </form>
    <p>
        <?php
            if (isset($_POST['SortArrFun']) && $_POST['SortArrFun'] == 'Calcola'){
                if(count($calcolatrice->getArray()) > 0){
                    echo "Ecco l'array in ordine crescente<br>";
                    print_r($calcolatrice->riordinaArray());
                }
            } elseif (isset($_POST['SortArrFun']) && $_POST['SortArrFun'] == 'Aggiungi'){
                $tempArr = $calcolatrice->getArray();
                array_push($tempArr, $_POST['valore']);
                $calcolatrice->set_array($tempArr);
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($tempArr);
            } else {
                echo"Aggiungi un valore da inserire nell'array";
                echo"<br><br>";
                echo"L'array attuale è : ";
                print_r($calcolatrice->getArray());
            }
        ?>
    </p>

</body>
</html>