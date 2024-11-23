<?php
require_once '25-ClassiCostruttoriDistruttori.php';

class Utente extends Persona {
    private $password = null;
    public function __construct($nome, $cognome, $password){
        parent::__construct($nome, $cognome);
        $this->password = $password;
    }

    protected function calcolaCodice()
    {
        return rand(1000000000, 9999999999);
    }
}

$utente = new Utente("Mario", "Rossi", "123456");
echo "<br>";
echo $utente->getNome();
echo "<br>";
echo $utente->getCognome();
echo "<br>";
echo $utente->stampaCodice();
echo "<br>";
?>