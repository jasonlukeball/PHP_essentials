<?php


$first = "The quick brown fox";
$second = " jumped over the lazy dog.";


$third = $first;
$third .= $second;
// concatenates $second onto the end of $third (which is currently equalling $first)
echo $third;


echo"<br/>";
echo"<br/>";

echo "Lowercase: " . strtolower($third);
// all letters in lowercase
echo"<br/>";
echo"<br/>";

echo "Uppercase: " . strtoupper($third);
// All letters in uppercase
echo"<br/>";
echo"<br/>";

echo "Uppercase first: " . ucfirst($third);
// First letter is capitalised
echo"<br/>";
echo"<br/>";

echo "Uppercase first: " . ucwords($third);
// Same as Proper in FileMaker - first letter in all words is capitalised
echo"<br/>";
echo"<br/>";

echo "Length of string: " . strlen($third);
// Length of string
echo"<br/>";
echo"<br/>";

echo "Trim: " . trim("     A B C D    E    F");
// Removes leading or trailing whitespace by default
echo"<br/>";
echo"<br/>";

$hello = "Hello";
$hello = trim($hello, "H");
// Removes any characters specified
// IS CASE SENSITIVE
echo $hello;
echo"<br/>";
echo"<br/>";

echo "Find: " .strstr($third, "brown");
// find the word "brown" the the $third string (will return everything after that word)
echo"<br/>";
echo"<br/>";

echo "Replace: " .str_replace("quick", "super-fast", $third);
// Substitutes the word "quick" with "super-fast"
echo"<br/>";
echo"<br/>";

echo "Repeat: " . str_repeat($third, 3);
// Repeats the string 3 thimes
echo"<br/>";
echo"<br/>";

echo "Make Substring: " . substr ($third,10,10);
// Similar to Middle function in FileMaker
// thing, positionStart, numberOfCharacters
echo"<br/>";
echo"<br/>";


echo "Find Position: " . strpos ($third, "brown");
// Start Position of "brown"
echo"<br/>";
echo"<br/>";


echo "Find Character: " . strchr($third,"quick");
// Returns the right of the string after it's found the character
// Similar to left ( string ; LengthOfString )
echo"<br/>";
echo"<br/>";


?>