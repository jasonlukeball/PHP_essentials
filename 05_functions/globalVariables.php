<?php


// Variables returned inside a function are only available WITHIN the function (unless explicitly returned)
// To use them outside, we use global variables
// We must also initialize any existing variables we want to use if we want to use them inside the function


$var = "outside the function";

function myFunction(){
    $var = "inside the function";
}

myFunction();

echo $var;

// Will never return $var from inside the function
// Will always return $var from outside/before the function



echo "</br></br>";


$var = "outside the function";

function myFunction2(){
    global $var;
    $var = "inside the function";
}

myFunction2();

echo $var;

// This one WILL return $var from inside the function because we have said this is a GLOBAL variable
// It's set to "outside" then inside the function it's set to "inside" and global
// Overwrites the original $var and makes it available outside the function


echo "</br></br>";


// Another example
// Get a variable from inside the function out...
// Make it global

function myFunction3 (){
    global $var1;
    $var1 = "something";
}

myFunction3();
echo $var1;
