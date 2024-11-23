<?php
/**
 * in questa lezione ha spiegato la differenza tra una dichiarazione private, protected e public :
 * private: significa che il metodo o la proprietà può essere utilizzato solo all'interno della classe in cui è stata dichiarata
 * protected: uguale a private, ma nelle classi figlie può essere sovrascritta (overriding)
 * public: significa che il metodo o la proprietà può essere utilizzato ovunque
 * 
 * overriding : è una tecnica di programmazione orientata agli oggetti che permette di ridefinire un metodo di una classe padre
 * in una classe figlia.
 * 
 * 
 * 
 * potrebbe capitare di dover importare due classi con lo stesso nome in questo caso ci viene in aiuto i namespace
 * facciamo un esempio di importazione di due classi con lo stesso nome Recapito
 * 
 * 
 * require_once 'Recapito.php';
 * require_once 'Recapito2.php';
 * 
 * questo codice ci darà errore perchè ci sono due classi con lo stesso nome Recapito
 * 
 * per risolvere questo problema dobbiamo utilizzare i namespace
 * 
 * use Gruppo1\Recapito;
 * use Gruppo2\Recapito as Recapito2;
 * 
 * i namespace Gruppo1 e Gruppo2 devono essere dichiarati all'interno delle librerie Recapito.php e Recapito2.php come segue
 * 
 * namespace Gruppo1;
 * class Recapito{
 * 
 * }
 * 
 * namespace Gruppo2;
 * class Recapito{
 * 
 * }
 * 
 * 
 * 
 */
?>