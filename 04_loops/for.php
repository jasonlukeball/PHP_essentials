<?php

/*

for (expr1; expr2; expr3) {
    statement
}

// expr1 is executed the first time only
// expr2 is the test expression which is checked at the start of each loop      // this is like "while"
// expr3 is executed at the end of every loop


// another way to think on it

for (initialize; test; each) {
    statement
}

*/


for ($count = 0; $count <= 10 ; $count++) {
    echo $count;
}

echo "</br></br>";


for ($count = 1; $count <= 20 ; $count++) {
    if ($count % 2 == 0) {
        echo "{$count} is an even number" . "</br>";
    } else {
        echo "{$count} is an odd number" . "</br>";
    }
}

// if the result of $count / 2 is an even number then say even else odd
// iterates 20 times
