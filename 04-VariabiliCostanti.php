<?php

//-----------------------------------------------------------
/**
 * definition of valid variables 
 * */ 

$myVar = "Hello World!"; // string
$myVar2 = 5; // integer
$myVar3 = 5.5; // float
$myVar4 = true; // boolean
$_myVar = "Hello World!"; // string
$_2myVar = "Hello World!"; // string

//-----------------------------------------------------------
/**
 * definition of invalid variables
 */

// $2myVar = "Hello World!"; // invalid variable name
// $myVar- = "Hello World!"; // invalid variable name
// $myVar@ = "Hello World!"; // invalid variable name
// $myVar! = "Hello World!"; // invalid variable name
// $myVar# = "Hello World!"; // invalid variable name

//-----------------------------------------------------------
/**
 * assign a new value to a variable
 */

$myVar = "Hello Mondo!"; // string
$myVar2 = 6+3; // integer

$b = 5;
$myVar = 2*$b; // integer

$myVar = str_repeat("Hello World!", 3); // string

//-----------------------------------------------------------
/**
 * the scope of a variable is the part of the script where it is visible
 * and can be :
 * - local, when it is defined inside a function
 * - global, when it is defined outside a function
 * - static, when it is defined inside a function and it is not deleted when the function ends
 * - superglobal, when it is defined in the global scope and it is accessible from any part of the script
 */

/**
 * global example
 */

$a = "ciao"; // global variable

function myFunction(){
    echo $a; // error because $a is not defined in the local scope
}

function myFunction2(){
    global $a; // $a is now visible in the local scope
    echo $a; // ciao
}

/**
 * local example
 */

function myFunction3(){
    $b = "ciao"; // local variable
    echo $b; // ciao
}

echo $b; // error because $b is not defined in the global scope

/**
 * static example
 */

function myFunction4(){
    static $c = 0; // static variable
    echo $c; // 0
    $c++;

myFunction4(); // 0
myFunction4(); // 1
myFunction4(); // 2


/**
 * superglobal example
 */

/**
 * $GLOBALS, contain all global variables defined in the script as 'global' keyword
 * $_GET, contain all variables passed to the script via the URL
 * $_POST, contain all variables passed to the script via the HTTP POST method
 * $_REQUEST, contain all parameters contained in $_GET, $_POST and $_COOKIE
 * $_SESSION, contain all variables stored in the session (server side)
 * $_COOKIE, contain all cookies sent to the script (client side)
 * $_SERVER, contain information about the server and the execution environment
 * $_FILES, contain information about uploaded files via the HTTP POST method
 * $_ENV, contain information about the environment variables
 */


/**
 * 
 * define a constant
 * 
 */

define("MYCONSTANT", "Hello World!"); // string
echo MYCONSTANT; // Hello World!

/**
 * PHP predefined constants
 */

 /**
  * 
    * __LINE__, the current line number of the file
    * __FILE__, the full path and filename of the file
    * __DIR__, the directory of the file
    * __FUNCTION__, the function name
    * __CLASS__, the class name
    * __TRAIT__, the trait name
    * __METHOD__, the class method name
    * __NAMESPACE__, the current namespace name
  */