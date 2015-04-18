<?php

// RETURN VALUE FROM A FUNCTION

function addTogether ($val1, $val2) {
    $sum = $val1 + $val2;
    // return the value... best practice is to ALWAYS include a return
    return $sum;
}

echo addTogether(5,10);

echo "</br>";
echo $result = addTogether(5,10);


echo "</br></br>";


function saySomething ($input){
    return $input;
}

// The result has been returned but will not appear until we echo it
$result = saySomething("Hi There");

// echo it
echo $result . "</br>";

// alternative one liner
echo saySomething("Hello Again");

echo "</br></br>";


// FUNCTIONS CAN ONLY RETURN ONE VALUE BUT WHAT IF WE NEED MORE THAN ONE?
// WE CAN RETURN THEM AS AN ARRAY


function multiValues ( $value1, $value2 ){
    return array($value1, $value2);
}

// Pass in two values into the function and return both values in an array
print_r( $result = multiValues("Hello","Jerk") );

