<?php
    /**
     * 
     * classe che rappresenta una persona
     * 
     * @author Ric
     * @version 1.0
     */

    class Persona {
        private $nome = null;
        public $cognome = null;
        private $eta = null;
        const testoBenvenuto = "Ciao %s benvenuto nella mia classe";

        public function __construct($nome, $cognome){
            $this->nome = trim($nome);
            $this->cognome = trim($cognome);
            echo "ho assegnato le variabili $nome e $cognome alle rispettive proprietà";
        }

        public function __destruct(){
            echo "Oggetto distrutto";
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getCognome(){
            return $this->cognome;
        }

        public function setCognome($cognome){
            $this->cognome = $cognome;
        }

        public function getEta(){
            return $this->eta;
        }

        public function setEta($eta){
            $this->eta = $eta;
        }

        public function saluta(){
            $utente = $this->nome . " " . $this->cognome;
            echo "<br>";
            printf(self::testoBenvenuto, $utente);
            echo "<br>";
        }

        public function stampaNomeCompleto(){
            echo "<br>";
            echo trim($this->nome . " " . $this->cognome);
            echo "equivale a ";
            echo trim($this->getNome() . " " . $this->getCognome());
        }

        protected function calcolaCodice(){
            return rand(10000, 99999);
        }

        public function stampaCodice(){
            echo "<br>";
            echo $this->calcolaCodice();
        }
    }

    
    /* $persona = new Persona("Riccardo", "Mancinelli");
    $persona->saluta();
    $persona->stampaNomeCompleto();
    $nome = $persona->getNome();
    echo "<br>";
    echo $nome;
    $cognome = $persona->getCognome();
    echo "<br>";
    echo $cognome;
    echo "<br>"; */
?>