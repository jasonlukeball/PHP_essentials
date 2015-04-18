<?php

// further reading . . .
// http://php.net/manual/en/ref.array.php


// Set an array and give it some numbers
$numbers = array(44,16,2,10,1000,128);

// Print array (readable)
echo "<pre>";
echo print_r($numbers) ;
echo "</pre>";
echo "</br></br>";



// Count values in array
echo "CountValues:" . count($numbers);
echo "</br></br>";


// Get the Max value
echo "Max:" . max($numbers);
echo "</br></br>";


// Get the Min value
echo "Min:" . min($numbers);
echo "</br></br>";


// Sort and Print
echo "Sorted by number:" . sort($numbers);
echo "<pre>";
echo print_r($numbers) ;
echo "</pre>";
echo "</br></br>";


// REVERSE Sort and Print
echo "REVERSE Sorted by number:" . rsort($numbers);
echo "<pre>";
echo print_r($numbers) ;
echo "</pre>";
echo "</br></br>";


// Take the array and turn it into an string
// Implode
// " - " is the separator
echo "Implode:" . $num_string = implode(" - ", $numbers);
echo "</br></br>";


// Take the string $num_string and turn it into an array
// Explode
// " - " is the separator, explode looks for this to separate objects
// This would be super useful if working with a comma separated list
echo "Explode:" . $num_string = explode(" - ", $num_string);
echo "<pre>";
echo print_r($numbers) ;
echo "</pre>";
echo "</br></br>";


// Is an value in an array?
echo "Is \"15\" in the array?" . " " . in_array(15, $numbers);          // Gives boolean result
echo "</br></br>";
echo "Is \"1000\" in the array?" . " " . in_array(1000, $numbers);      // Gives boolean result
echo "</br></br>";

