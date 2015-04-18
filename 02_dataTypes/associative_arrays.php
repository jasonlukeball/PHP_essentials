<?php

// Define an array with two keys and two values
$assoc = array("first_name" => "Kevin" , "last_name" => "Smith");

// Get first name
echo $assoc["first_name"];
echo "</br></br>";

// Get the first and last name
echo $assoc["first_name"] . " " . $assoc["last_name"];
echo "</br></br>";

// Change the first name
$assoc["first_name"] = "Jason";
echo $assoc["first_name"] ;
echo "</br></br>";

// Associative Arrays contain key value pairs

?>