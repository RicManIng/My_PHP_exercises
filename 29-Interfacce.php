<?php
/**
 * 
 * un'interfaccia è un contratto che definisce un insieme di metodi che una classe deve implementare
 * NB : un'interfaccia non può contenere proprietà
 * i metodi inoltre devono essere strettamente implementati altrimenti si avrà un errore
 * i metodi di un'interfaccia sono sempre pubblici (è pensato per aiutare a dexcrivere come una classe verrà usata)
 * 
 */

interface InterfacePersona{
    public function getNome();
    public function getCognome();
}

interface InterfaceStampa{
    const testoBenvenuto = "Ciao %s benvenuto nella mia classe";
    public function stampaNomeCompleto();
    public function saluta();
}

class Persona implements InterfacePersona, InterfaceStampa{
    private $nome = null;
    private $cognome = null;

    public function __construct($nome, $cognome){
        $this->nome = $nome;
        $this->cognome = $cognome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCognome(){
        return $this->cognome;
    }

    public function stampaNomeCompleto(){
        echo $this->nome . " " . $this->cognome;
    }

    public function saluta(){
        echo "Ciao " . $this->getNome() . " " . $this->getCognome();
    }
}

$persona = new Persona("Mario", "Rossi");
$persona->saluta();
echo "<br>";
$persona->stampaNomeCompleto();
echo "<br>";
?>