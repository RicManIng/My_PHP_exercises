<?php
/**
 * il type hinting è una tecnica che permette di specificare il tipo di dato che una funzione deve accettare
 */

class Classe1{
    public $proprieta = null;
    public function __construct($proprieta){
        $this->proprieta = $proprieta;
    }
}

class Classe2{
    public $proprieta = null;
    public function __construct($proprieta){
        $this->proprieta = $proprieta;
    }
}

class Classe3{
    private $oggetto = null;
    public function __construct(Classe1 $oggetto){
        $this->oggetto = $oggetto;
    }

    public function getProperty(){
        return $this->oggetto->proprieta;
    }
}

$cls1 = new Classe1('Proprietà della classe 1');
$cls2 = new Classe2('Proprietà della classe 2');
$cls3 = new Classe3($cls1);
echo $cls3->getProperty();
// Fatal error: Uncaught TypeError: Argument 1 passed to Classe3::__construct() must be an instance of Classe1, instance of Classe2 given, called in /var/www/html/30-TypeHinting.php on line 30 and defined in /var/www/html/30-TypeHinting.php:20
?>