<?php

// For each loops are tailor made for working with arrays
// For each loops take an array and loop through each item in the array until the end
// They know when to quit, because it's the end of the array


/*

foreach ($array as $value) {
    statement;
}

*/


$numbers = array(1,20,5,33,65,101);


print_r($numbers);
echo "</br></br>";



// $numbers is a plural (all items in array)
// $number is singular (referencing the particular value we are on in the loop)

foreach ($numbers as $number) {
    echo $number . "</br>";
}



/*

// Working with associative arrays

foreach ($array as $key => $value) {
    statement;
}

*/


$person = array(
    "first_name"    => "Jason",
    "last_name"     => "Ball",
    "address1"      => "Unit 8",
    "address2"      => "4 Julia Street",
    "city"          => "Ashfield",
    "state"         => "NSW",
    "postcode"      => "2131",
);


echo "</br></br>";


foreach ($person as $key => $value) {
    echo $key . " " . $value . "</br>";
}





