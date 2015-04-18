<?php

function paint ( $room="office", $color="red" ){
    return "The color of the {$room} is {$color}.";
}

// We are going to print the default arguments here because we have not passed any below
echo paint();



echo "</br></br>";



// This time we are passing arguments ourselves
echo paint("bedroom","purple");



echo "</br></br>";



// This time we are ONLY ONE argument
echo paint("living room");


