<?php

class Classe1{
    public $proprieta = null;
    public function __construct($proprieta){
        $this->proprieta = $proprieta;
    }
}

$cls1 = new Classe1('Proprietà della classe 1');
$cls2 = $cls1;
$cls2->proprieta = 'Proprietà della classe 2';  // in questo caso la proprietà di $cls1 cambia, le variabili puntano allo stesso oggetto

var_dump($cls1);
var_dump($cls2);

echo "-----------------------------------------------------";

$cls1 = new Classe1('Proprietà della classe 1');
$cls2 = clone $cls1;
$cls2->proprieta = 'Proprietà della classe 2';  // in questo caso la proprietà di $cls1 non cambia, le variabili puntano a due oggetti diversi

var_dump($cls1);
var_dump($cls2);

echo "-----------------------------------------------------";
?>