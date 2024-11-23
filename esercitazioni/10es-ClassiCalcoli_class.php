<?php

class Calcolatrice{
    private $altezza = null;
    private $larghezza = null;
    private $naturale = null;
    private $array = [];

    public function __construct(){
        //echo "Costruttore chiamato";
    }

    public function set_altezza($value){
        if(is_numeric($value)){
            $this->altezza = $value;
        } else {
            echo "Il valore inserito non è un numero";
        }
    }

    public function set_larghezza($value){
        if(is_numeric($value)){
            $this->larghezza = $value;
        } else {
            echo "Il valore inserito non è un numero";
        }
    }

    public function set_naturale($value){
        if(is_numeric($value)){
            $this->naturale = $value;
        } else {
            echo "Il valore inserito non è un numero";
        }
    }

    public function set_array($value){
        if(is_array($value)){
            $this->array = $value;
        } else {
            echo "Il valore inserito non è un array";
        }
    }

    public function getArray(){
        return $this->array;
    }

    public function calcolaPerimetro(){
        return 2*$this->altezza * 2*$this->larghezza;
    }

    public function calcolaArea(){
        return $this->altezza * $this->larghezza;
    }

    public function parioDispari(){
        return (($this->naturale&1) ? "Il valore $this->naturale è dispari" : "Il valore $this->naturale è pari");
    }

    public function somma0N(){
        $somma = 0;
        for($i = 0; $i <= $this->naturale; $i++){
            $somma += $i;
        }
        return $somma;
    }

    public function sommadispari0N(){
        
    }

    public function cercaMinimo(){
        return min($this->array);
    }

    public function riordinaArray(){
        sort($this->array);
        return $this->array;
    }
}