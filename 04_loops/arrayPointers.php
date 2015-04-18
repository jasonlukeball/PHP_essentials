<?php



// Pointers are basically which is the current object we are looking at

$numbers = array(1,20,5,33,65,101);

echo "<pre>";
print_r($numbers);
echo "</pre>";


// current: current pointer value
echo "Result 1: " . current($numbers) . "</br>";

// next: move the pointer forward
// similar to using continue inside a loop

next($numbers);
echo "Result 2: " . current($numbers) . "</br>";

// Go forward 2 places
next($numbers);
next($numbers);
echo "Result 3: " . current($numbers) . "</br>";

// pref: move the pointer backwards
// go back 2 places
prev($numbers);
prev($numbers);
echo "Result 4: " . current($numbers) . "</br>";

// reset: move the pointer back to the first value
reset($numbers);
echo "Result 5: " . current($numbers) . "</br>";

// end: move the pointer to the last value
end($numbers);
echo "Result 6: " . current($numbers) . "</br>";


echo "</br></br>";

// while loop that moves the array pointer
// similar to for each
reset($numbers);        // sets the pointer back to the start

while ($number = current($numbers)) {
    echo $number . "</br>";
    next($numbers);
}