<?php

/**
 * for loop
 */
echo("<br>RISULTATO ISTRUZIONE FOR<br>");

for ($i = 0; $i < 10; $i++) {
    echo "Sono al ciclo : $i <br>";
}

echo(str_repeat("-", 50) . "<br><br>");
//exit();

/**
 * while loop
 */

echo("<br>RISULTATO ISTRUZIONE WHILE<br>");

$i = 0;
while ($i < 10) {
    echo "Sono al ciclo : $i <br>";
    $i++;
}

echo(str_repeat("-", 50) . "<br><br>");
//exit();

/**
 * do-while loop
 */

echo("<br>RISULTATO ISTRUZIONE DO-WHILE<br>");

$i = 0;
do {
    echo "Sono al ciclo : $i <br>";
    $i++;
} while ($i < 10);

echo(str_repeat("-", 50) . "<br><br>");
//exit();

/**
 * foreach loop
 */

echo("<br>RISULTATO ISTRUZIONE FOREACH<br>");

$colors = array("red", "green", "blue", "yellow");

$array = ["key1" => "value1", "key2" => "value2", "key3" => "value3"];

foreach ($colors as $value) {
    echo "$value <br>";
}

foreach ($array as $key => $value) {
    echo "$key : $value <br>";
}

echo(str_repeat("-", 50) . "<br><br>");
//exit();