<?php

// Must put a break statement in if you want the switch to execute only one set of results


/*

switch (value) {
    case test_value1:
        statement
        break;
    case test_value2:
        statement
        break;
    default:
        statement
}

*/


$i = 1;


switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    default:
        echo "ERROR";
}

echo "</br></br>";



// Switch statements are case sensitive
// Try "Apple" you won't get a result


$i = "apple";

switch ($i) {
    case "apple":
        echo "i is apple";
        break;
    case "bar":
        echo "i is bar";
        break;
    case "cake":
        echo "i is cake";
        break;
}

echo "</br></br>";

switch ($i) {
    case "apple":   echo "i is apple";  break;
    case "bar":     echo "i is bar";    break;
    case "cake":    echo "i is cake";   break;
}

