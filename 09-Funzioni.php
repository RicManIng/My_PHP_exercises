<?php

/**
 * function example
 */

function scriviCiao() {
    echo "Ciao!";
}

echo(str_repeat("-", 50) . "<br><br>");
scriviCiao();
echo(str_repeat("-", 50) . "<br><br>");

/**
 * function example with parameters
 */

function scriviCiaoA($nome) {
    echo "Ciao $nome!";
}

echo(str_repeat("-", 50) . "<br><br>");
scriviCiaoA("Mario");
echo(str_repeat("-", 50) . "<br><br>");


/**
 * function example with return value
 */

function somma($a, $b) {
    return $a + $b;
}

echo(str_repeat("-", 50) . "<br><br>");
echo somma(5, 3);
echo(str_repeat("-", 50) . "<br><br>");

/**
 * function example with default value
 */

function sommaB($a, $b = 1) {
    return $a + $b;
}

echo(str_repeat("-", 50) . "<br><br>");
echo sommaB(5);
echo(str_repeat("-", 50) . "<br><br>");



