<?php


$number = 101;
$float = 101.101;
$string = "Hello";
$array = array(1 => "Homepage", 2 => "About Us", 3 => "Services");

var_dump($number);
echo "</br></br>";

var_dump($float);
echo "</br></br>";

var_dump($string);
echo "</br></br>";

var_dump($array);
echo "</br></br>";



// returns an array of all defined variables
echo "<pre>";
print_r ( get_defined_vars() );
echo "</pre>";
echo "</br></br>";



// function
function saySomething($thingToSay) {
    echo $thingToSay;
    // returns information on the functions that have been called
    echo "<pre>";
    var_dump ( debug_backtrace() );
    echo "</pre>";
}
saySomething("Hi Jason, you rock!");




