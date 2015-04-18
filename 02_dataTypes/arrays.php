<?php

// An array is "An ordered, integer-indexed collection of objects"
// Group strings and numbers
// We can say, give me the first object, the second object etc

$numbers = array();
// defined an empty array and assigned it to $numbers

$numbers = array(4,6,16,32,64,128);
// array with numbers in it
// values  stay in the exact order they are created (unless we change it)

echo "\$numbers = array(4,6,16,32,64,128)";
echo "</br></br>";

echo $numbers[1];
// give me the second value



echo "</br></br>";
echo "</br></br>";


$mixed = array(6, "fox", "dog", array("xxx", "yyy", "zzz",));
echo "\$mixed = array(6, \"fox\", \"dog\", array(\"x\", \"y\", \"z\",))";
echo "</br></br>";
echo "0 = " . $mixed[0] . "</br>";
echo "1 = " . $mixed[1] . "</br>";
echo "2 = " . $mixed[2] . "</br>";
echo "3 = " . $mixed[3] . "</br>";


// This is a really neat way to print arrays in human readable format
// print_r = "Print Readable"
echo "<pre>";
echo print_r($mixed);
echo "</pre>";
echo "</br></br>";



// Get a value from an array within an array
echo $mixed[3][1];
echo "</br></br>";

// Put something into an array
$mixed[2] = "newvalue";
echo $mixed[2];
echo "</br></br>";


// Add a new value (we know where to put it)
$mixed[4] = "whatever";
echo "<pre>";
echo print_r($mixed);
echo "</pre>";
echo "</br></br>";

// Add a new value (we DON'T know where to put it)
$mixed[] = "somethingFUN";
echo "<pre>";
echo print_r($mixed);
echo "</pre>";
echo "</br></br>";
