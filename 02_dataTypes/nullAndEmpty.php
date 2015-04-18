<?php


$var1 = null ;
$var2 = "" ;

// IS NULL ?
// Means there is no value
echo "IS NULL?";
echo "</br></br>";

echo "var1 is null? " . is_null($var1);
echo "</br></br>";

echo "var2 is null? " . is_null($var2);
echo "</br></br>";

// $var 3 has not been set!
echo "var3 is null? " . is_null($var3);
echo "</br></br>";
echo "</br></br>";



// IS SET ?
// basically means "Is not null" ( not IfEmpty )
echo "IS SET?";
echo "</br></br>";

echo "var1 is set? " . isset($var1);
echo "</br></br>";

echo "var2 is set? " . isset($var2);
echo "</br></br>";

// $var 3 has not been set!
echo "var3 is set? " . isset($var3);
echo "</br></br>";
echo "</br></br>";


// IS EMPTY ?
// PHP considers the following values "Empty"
// "", null, 0, 0.0, "0", false, array()
echo "IS EMPTY?";
echo "</br></br>";

echo "var1 is empty? " . empty($var1);
echo "</br></br>";

echo "var2 is empty? " . empty($var2);
echo "</br></br>";

// $var 3 has not been set!
echo "var3 is empty? " . empty($var3);
echo "</br></br>";
echo "</br></br>";