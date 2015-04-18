<?php


// INCLUDE
// Gets all the stuff from "included.php"
include("included.php");


// call the hello function from the "included.php" file
saySomething();

// Good things to include are functions, layout sections of pages (header, footer, nav etc (anything we don't need to code multiple times
// CSS & JavaScript

echo "</br></br>";

// REQUIRE
// This is the same as include but will throw an error if the file is not found or unavailable
require("aFileThatDoesNotExist.php");


// INCLUDE ONCE
// This keeps an array of paths to files that have already been included
// as it included a file, it adds it to an array

// REQUIRE ONCE
// Same idea but required