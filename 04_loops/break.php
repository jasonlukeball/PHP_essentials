<?php

// Break ends the iteration of the loop
// Exits the loop & stops the whole process
// These loops will exit at 5 and will only print 1,2,3,4
// This is really good for very long code, improves performance by doing less work


for ($count = 0; $count <= 10 ; $count++) {
    if ($count == 5){
        break;
    }
    echo $count;
}


echo "</br></br>";


$count = 0;
while ($count <= 10) {
    if ($count == 5) {
        // exit, halt
        break;
    }
    // else print the count
    echo $count;
    $count ++ ;
}