<?php

/**
 * boolean type example
 */

$var = true;
$var = false;
$var = 1 && 0; // false
$var = 1 || 0; // true
$var = !true; // false
$var = !false; // true


/**
 * integer type example
 * interval defined by PHP_INT_MIN and PHP_INT_MAX
 */

$var = 1;
$var = -1;
$var = 0x1A; // 26
$var = 5+5; // 10
$var = 5-5; // 0
$var = 5*5; // 25
$var = 5/5; // 1
$var = 5%5; // 0
$var = 5**2; // 25
$var = 5++; // 6
$var = 5--; // 4
$var = 5+=5; // 10
$var = 5-=5; // 0
$var = 5*=5; // 25
$var = 5/=5; // 1
$var = 5%=5; // 0
$var = 5**=2; // 25


/**
 * float type example
 * not used for precise calculations (money, etc.)
 */

$var = 1.1;
$var = -1.1;
$var = 2.3E-3; // 0.0023
$var =2.3E3; // 2300


/**
 * string type example
 */

$var = "Hello World!"; // in this case if we use single quotes we will have the same result
$var = 'Hello World!';

$nome = "Mario";
$var = "Ciao $nome!"; // Ciao Mario!
$var = 'Ciao $nome!'; // Ciao $nome!
$var = "Ciao {$nome}!"; // Ciao Mario!
$var = 'Ciao '.$nome.'!'; // Ciao Mario!

$var = "Ciao"; // Ciao
$var = $var." Mario!"; // Ciao Mario!

$var = 'Piero dice: "Ciao Mario!"'; // Piero dice: "Ciao Mario!"
$var = "Piero dice: \"Ciao Mario!\""; // Piero dice: "Ciao Mario!"
$var = 'Piero dice: \'Ciao Mario!\'';
$var = "Piero dice: 'Ciao Mario!'";

$var = <<<EOD
Ciao $nome!
Come stai?
EOD;


/**
 * array type example
 */

$var = array();
$var = [];
$var = array(1, 2, 3);
$var = [1, 2, 3];
$var = array("a" => 1, "b" => 2, "c" => 3);
$var = ["a" => 1, "b" => 2, "c" => 3];
$var = array(1, "a" => 2, 3);
$var = array(1, false, 'b');


/**
 * null type example
 */

$var = null;