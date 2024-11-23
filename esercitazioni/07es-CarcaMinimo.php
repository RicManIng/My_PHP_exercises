<?php
    function cerca_minimo($my_array){
        if(is_array($my_array)){
            return min($my_array);
        }
    }

    echo "il minimo è : " . cerca_minimo([2, 5, 1, 8, 4, 10, 56])
?>