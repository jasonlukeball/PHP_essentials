<?php


// a function is code that performs a specific task,
// it has been packaged up into a single unit that can be called upon when it's needed
// lets create some custom functions....

/*

function name ($arg1, $arg2) {
    statement;
}

// $arg1 & $arg2 are the arguments the function is going to accept

*/


// FUNCTION
// no arguments in this one
function hello() {
    echo "Hello";
}
// call this function
hello();



echo "</br></br>";



// FUNCTION WITH ARGUMENT (PARAMETER)
function saySomething($thingToSay) {
    echo $thingToSay;
}
// call this function
saySomething("Hi Jason, you rock!");



echo "</br></br>";



//FUNCTION WITH MULTIPLE ARGUMENTS
function better_hello ($greeting, $target, $punctuation){
    echo $greeting . " " . $target . $punctuation . "</br>";
}

better_hello("Hi","Jason",".");
better_hello("Hello","Msh","!");
better_hello("Hello","Msh",null);




