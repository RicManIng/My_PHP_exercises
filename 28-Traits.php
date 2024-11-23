<?php
trait FunzioniGenerali {
    public function somma($a, $b){
        return $a + $b;
    }

    public function sottrazione($a, $b){
        return $a - $b;
    }
}

class Classe1 {
    use FunzioniGenerali;
}

class Classe2 {
    use FunzioniGenerali;
}

$classe1 = new Classe1();
echo $classe1->somma(10, 20);
echo "<br>";
echo $classe1->sottrazione(10, 20);
echo "<br>";
$classe2 = new Classe2();
echo $classe2->somma(10, 20);
echo "<br>";
echo $classe2->sottrazione(10, 20);
echo "<br>";
?>