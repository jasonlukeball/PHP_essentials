<?php

// Integers are WHOLE numbers

$var1 = 3;
$var2 = 4;

echo "Basic Math: " . $var1 * $var2;
echo "<br/><br/>";

echo    "Absolute Value: "      .  abs(0-300)           ."<br/>";
// Just give me the whole number, doesn't care if negative value

echo    "Exponential "          .  pow(2,8)             ."<br/>";
// 2 to the power of 8

echo    "Square Root: "         .  sqrt(100)            ."<br/>";
// Square root

echo    "Modulo: "              .  fmod(20,7)           ."<br/>";
// Same as Mod in FileMaker

echo    "Random: "              .  rand()               ."<br/>";
// Random number

echo    "Random (min,max): "    .  rand(1,10)           ."<br/>";
// Random number between 1-10

echo "<br/><br/>";


// --------------
// INCREMENT
// --------------

// DEFINE VARIABLE
$var3 = 10;
echo "\$var3 = " . $var3;
echo "<br/><br/>";

// EXAMPLE 1
$var3 += 1;                                 // Add 1 to $var3
// increment by 1
echo "INCREMENT: 10 + 1 = " . $var3;
echo "<br/><br/>";

// EXAMPLE 2
$var3 = 10;
++$var3;                                    // Add 1 to $var3
// increment by 1
echo "INCREMENT: 10 + 1 = " . $var3;
echo "<br/><br/>";


// --------------
// DECREMENT
// --------------

// DEFINE VARIABLE
$var3 = 10;

// EXAMPLE 1
$var3 -= 1;                                 // Minus 1 to $var3
// decrement by 1
echo "DECREMENT: 10 - 1 = " . $var3;
echo "<br/><br/>";


// --------------
// DIVISION
// --------------

// DEFINE VARIABLE
$var3 = 10;

// EXAMPLE 1
$var3 /= 2;                                 // Divide $var3 by 2
// decrement by 1
echo "DIVISION: 10 / 2 = " . $var3;
echo "<br/><br/>";


// --------------
// MULTIPLY
// --------------

// DEFINE VARIABLE
$var3 = 10;

// EXAMPLE 1
$var3 *= 10;                                 // Times $var3 by 10
// decrement by 1
echo "MULTIPLY: 10 * 10 = " . $var3;
echo "<br/><br/>";








