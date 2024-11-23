<?php

/**
 * string example
 * echo construct
 */

echo "ciao";
echo("<br>" . str_repeat("-", 50) . "<br><br>");
echo("ciao");
echo("<br>" . str_repeat("-", 50) . "<br><br>");

echo (2+2) * 2;
echo("<br>" . str_repeat("-", 50) . "<br><br>");

echo "ciao ", "mondo";
echo("<br>" . str_repeat("-", 50) . "<br><br>");

echo "ciao " . "mondo";
echo("<br>" . str_repeat("-", 50) . "<br><br>");

echo ("ciao ", "mondo"); //error
echo("<br>" . str_repeat("-", 50) . "<br><br>");

echo ("ciao " . "mondo");
echo("<br>" . str_repeat("-", 50) . "<br><br>");

echo ("ciao "), ("mondo"); //not suggested
echo("<br>" . str_repeat("-", 50) . "<br><br>");
echo ("ciao") . ("mondo"); //not suggested
echo("<br>" . str_repeat("-", 50) . "<br><br>");

$a = "ciao";
$b = "mondo";

echo $a . " " . $b;
echo("<br>" . str_repeat("-", 50) . "<br><br>");
echo $a, " ", $b;
echo("<br>" . str_repeat("-", 50) . "<br><br>");
echo("ciao $b");
echo("<br>" . str_repeat("-", 50) . "<br><br>");

echo (true);
echo("<br>" . str_repeat("-", 50) . "<br><br>");


/**
 * 
 * string examples
 * print construct
 */

$ritorno = print "ciao";
echo("<br>" . str_repeat("-", 50) . "<br><br>");

print "Valore ritorno : $ritorno";
echo("<br>" . str_repeat("-", 50) . "<br><br>");

if(print "ciao") {
    print "mondo";
}
echo("<br>" . str_repeat("-", 50) . "<br><br>");

print 4*3;


/**
 * showing array values
 * print_r construct
 */

$array = ["key1" => "value1", "key2" => "value2", "key3" => "value3"];
echo($array); //error
echo("<br>" . str_repeat("-", 50) . "<br><br>");
print_r($array);
echo("<br>" . str_repeat("-", 50) . "<br><br>");
