<?php
/**
 * una classe astratta è una classe che non può essere istanziata
 * è utile in fase di progettazione per definire delle classi che devono essere estese
 */
abstract class AbstractPersona{
    protected $nome = null;
    protected $cognome = null;

    public function getNome(){
        return $this->nome;
    }

    public function getCognome(){
        return $this->cognome;
    }

    abstract function stampaNomeCompleto();
    abstract function saluta();
}

class Persona extends AbstractPersona{
    public function __construct($nome, $cognome){
        $this->nome = $nome;
        $this->cognome = $cognome;
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