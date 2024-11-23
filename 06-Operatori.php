<?php

/**
 * aritmethic operators
 */

$a = 5+1;
$a = 5-1;
$a = 5*2;
$a = 5/2;
$a = 5%2;

//-----------------------------------------------------------

$a = 5;
$b = 10;

$c = $a + $b; // 15
$c = $a - $b; // -5
$c = $a * $b; // 50
$c = $a / $b; // 0.5
$c = $a % $b; // 5

//-----------------------------------------------------------

function val_A(){
    return 5;
}

function val_B(){
    return 10;
}

$c = val_A() + val_B(); // 15
$c = val_A() - val_B(); // -5
$c = val_A() * val_B(); // 50
$c = val_A() / val_B(); // 0.5
$c = val_A() % val_B(); // 5

//-----------------------------------------------------------

/**
 * assignment operators
 */

$a = 5;
$a += 5; // 10
$a -= 5; // 0
$a *= 5; // 25
$a /= 5; // 1
$a %= 5; // 0

function valore(){
    return 5;
}

$a = valore();

$a = "stringa";
$a .= " concatenata"; // stringa concatenata


/**
 * boolean operators
 */

$a = true;
$b = false;

!$a; // false
$a && $b; // false
$a || $b; // true

/**
 * a value different from 0 or an empty array is considered true
 */

10 && true; // true
0 && true; // false
[] && true; // false
[1, 2, 3] && true; // true


/**
 * conditional operators
 */

$a = (10 && true) ? "vero" : "falso"; // vero
$a = (0 && true) ? "vero" : "falso"; // falso


/**
 * relational operators
 * 
 * ==,      equal               5 == 5      true if the two operands are equal
 * ===,     identical           5 === 5     true if the two operands are equal and of the same type
 * !=,      not equal           5 != 5      true if the two operands are not equal
 * !==,     not identical       5 !== 5     true if the two operands are not equal or not of the same type
 * <,       less than           5 < 5       true if the left operand is less than the right operand
 * >,       greater than        5 > 5       true if the left operand is greater than the right operand
 * <=,      less than or equal  5 <= 5      true if the left operand is less than or equal to the right operand
 * >=       greater than or equal 5 >= 5    true if the left operand is greater than or equal to the right operand
 */
 * 
 */

3 == 3; // true
3 === 3; // true
3 == "3"; // true
3 === "3"; // false

3 != 3; // false
3 !== 3; // false
3 != "3"; // false
3 !== "3"; // true

3 < 3; // false
3 > 3; // false
3 <= 3; // true
3 >= 3; // true

/**
 * it is possible to compare strings in the following way
 * 1. Upper case letters are less than lower case letters
 * 2. Numbers are less than letters
 */

$a = "MAIUSCOLO";
$b = "minuscolo";
$c = "123 ciao";

$a < $b; // true
$a < $c; // true
$b < $c; // true
