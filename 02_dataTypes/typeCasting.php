<?php

// Type Juggling and Type Casting

// Convert values from one type to another
// string,
// int, integer,
// float,
// array,
// bool, boolean


// Type Juggling
// This is where you mix results together or different data types and that changes the original data type

echo "<h3>Type Juggling</h3>";
$count = "2";                               // string
echo $count . " " . gettype($count);        // print var and tell me what data type it is
echo "</br></br>";

$count += 3;                                // adding a number to a string turns it into an integer
echo $count . " " . gettype($count);        // print var and tell me what data type it is
echo "</br></br>";


$cats = "I have " . $count . " cats." ;     // adding the integer into string = string
echo $cats . " " . gettype($cats);          // print var and tell me what data type it is
echo "</br></br>";
echo "</br></br>";



// Type Casting
// This is where you intentionally change the data type

echo "<h3>Type Casting</h3>";

$count = "12345";
echo $count . " " . gettype($count);        // print var and tell me what data type it is
echo "</br></br>";


settype($count, "integer");                 // turn into an integer
echo $count . " " . gettype($count);        // print var and tell me what data type it is
echo "</br></br>";


$count = (string) $count;                   // different method of conversion
echo $count . " " . gettype($count);        // print var and tell me what data type it is
echo "</br></br>";

$count = (int) $count;                      // different method of conversion
echo $count . " " . gettype($count);        // print var and tell me what data type it is
echo "</br></br>";