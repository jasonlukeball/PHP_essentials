<?php

// Called floats for short
// These are decimal numbers
// 2.75 is an example of a floating point number type
// 2 is an an example of an integer number type


echo $float = 3.14;
echo "</br></br>";

echo $float = 3.14 + 7;
echo "</br></br>";

echo $float = 3.14 / 2;
echo "</br></br>";
echo "</br></br>";



$float = 10.666;
echo "\$float = 10.666";
echo "</br></br>";

// ROUNDING
echo "Round to 1dp = " . round($float, 1);
echo "</br></br>";

// CEILING
echo "Ceiling (round up to a whole number) = " . ceil($float);
echo "</br></br>";

// FLOOR
echo "Floor (round down to a whole number) = " . floor($float);
echo "</br></br>";


echo "</br></br>";
echo "</br></br>";



$float= 1.234;
$integer=101;

// Hey PHP, is my number an integer ?
// 1 = Yes "" = No
echo "Is {$integer} integer? " . is_int($integer);
echo "</br></br>";
echo "Is {$float} integer? " . is_int($float);


echo "</br></br>";
echo "</br></br>";


// Hey PHP, is my number a float ?
// 1 = Yes "" = No
echo "Is {$integer} float? " . is_float($integer);
echo "</br></br>";
echo "Is {$float} float? " . is_float($float);


echo "</br></br>";
echo "</br></br>";


// Hey PHP, is my VARIABLE numeric ?
// 1 = Yes "" = No
echo "Is {$integer} numeric? " . is_numeric($integer);
echo "</br></br>";
echo "Is {$float} numeric? " . is_numeric($float);

$someText = "someText";
echo "</br></br>";
echo "Is {$someText} numeric? " . is_numeric($someText);






