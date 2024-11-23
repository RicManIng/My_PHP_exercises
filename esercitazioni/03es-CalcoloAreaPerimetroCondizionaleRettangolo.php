<?php
function calcolo_area_perimetro_rettangolo($condizione, $base, $altezza){
    if ($condizione == "area"){
        return ($base*$altezza);
    } elseif ($condizione == "perimetro"){
        return (2*$base + 2*$altezza);
    } else {
        return "la condizione inserita non è supportata";
    }
    
}

echo "L'area del rettangolo è : " . calcolo_area_perimetro_rettangolo("area", 5, 10);
echo "<br><br>";
echo "L'area del rettangolo è : " . calcolo_area_perimetro_rettangolo("pippo", 5, 10);
?>