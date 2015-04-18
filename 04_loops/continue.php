<?php

// Continue basically means 'don't evaluate whatever... skip... next...'
// In these examples when the loop hits 5 it will not be echoed, the loop jumps out of 5 (continues) and goes onto 6

for ($count = 0; $count <= 10 ; $count++) {
    if ($count == 5){
     continue;
    }
    echo $count;
}


echo "</br></br>";


$count = 0;
while ($count <= 10) {
    if ($count == 5) {
        // exit, skip, move on
        // need to increment here or get stuck in infinite loop
        $count++;
        continue;
    }
    // else print the count
    echo $count;
    $count ++ ;
}