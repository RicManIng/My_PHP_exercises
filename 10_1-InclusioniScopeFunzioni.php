<?php

function somma($a, $b) {
    return $a + $b;
}

function sommaB($a, $b = 1) {
    return $a + $b;
}

function scriviCiaoA($nome) {
    echo "Ciao $nome!";
}

function scriviCiao() {
    echo "Ciao!";
}