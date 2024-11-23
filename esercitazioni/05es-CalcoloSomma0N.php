<?php
    function calcolo_somma_0N($valore){
        $somma = 0;
        for($i = $valore; $i == 0; $i--){
            $somma += $i;
        }
        return $somma;
    }

    echo calcolo_somma_0N(5);
    echo calcolo_somma_0N(50);
    echo calcolo_somma_0N(500);
    echo calcolo_somma_0N(500000000);
?>