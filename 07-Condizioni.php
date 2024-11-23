<?php

/**
 * if statement
 */

echo("<br>RISULTATO ISTRUZIONE IF<br>");

$a = 10;

if($a > 5){
    echo "a is greater than 5<br>";
}

echo(str_repeat("-", 50) . "<br><br>");
//exit();

/**
 * if-else statement
 */

echo("<br>RISULTATO ISTRUZIONE IF-ELSE<br>");

if($a == 10){
    echo "a is equal to 10<br>";
} else {
    echo "a is not equal to 10<br>";
}

echo(str_repeat("-", 50) . "<br><br>");
//exit();

/**
 * if-elseif-else statement
 */

echo("<br>RISULTATO ISTRUZIONE IF-ELSEIF-ELSE<br>");

function valore(){
    return 11;
}

if($a == 10){
    echo "a is equal to 10<br>";
} elseif($a == valore()){
    echo "a is equal to valore<br>";
} else {
    echo "a is not equal to 10 or valore<br>";
}

echo(str_repeat("-", 50) . "<br><br>");
//exit();


/**
 * switch statement
 */

echo("<br>RISULTATO ISTRUZIONE SWITCH<br>");

switch($a){
    case 10:
        echo "a is equal to 10<br>";
        break;
    case valore():
        echo "a is equal to valore<br>";
        break;
    default:
        echo "a is not equal to 10 or valore<br>";
}

echo(str_repeat("-", 50) . "<br><br>");
//exit();
