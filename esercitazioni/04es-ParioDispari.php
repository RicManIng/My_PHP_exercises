<?php
function pari_o_dispari($my_array){
    if(is_array($my_array)){
        foreach($my_array as $value){
            if ($value%2 == 0){
                echo "il valore " . $value . " è un numero pari";
            } else {
                echo "il valore " . $value . " è un numero dispari";
            }
        }
    } else {
        echo "accetto solo degli array";
    }
}

$number_array = [2,3,4,5,6,7,8];
pari_o_dispari($number_array);
?>