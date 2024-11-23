<?php

require_once '10_1-InclusioniScopeFunzioni.php'; // include the file with the functions only once

// require '10_1-InclusioniScopeFunzioni.php'; // include the file with the functions
// include '10_1-InclusioniScopeFunzioni.php'; // include the file with the functions

/**
 * the difference betweem require and include is that require will produce a fatal error (E_COMPILE_ERROR) and the script will stop,
 * while include will produce a warning (E_WARNING) and the script will continue (when the error is in the imported file)
 */

/**
 * function example
 */

echo(str_repeat("-", 50) . "<br><br>");
scriviCiao();
echo(str_repeat("-", 50) . "<br><br>");

/**
 * function example with parameters
 */

echo(str_repeat("-", 50) . "<br><br>");
scriviCiaoA("Mario");
echo(str_repeat("-", 50) . "<br><br>");

/**
 * function example with return value
 */

echo(str_repeat("-", 50) . "<br><br>");
echo somma(5, 3);
echo(str_repeat("-", 50) . "<br><br>");

/**
 * function example with default value
 */

echo(str_repeat("-", 50) . "<br><br>");
echo sommaB(5);
echo(str_repeat("-", 50) . "<br><br>");



