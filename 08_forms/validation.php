<?php

// VALIDATION TYPES




// PRESENCE             (VALUE EXISTS)
$value = "";
if ( empty($value)){
    echo "Validation Failed: EMPTY";
}

// STRING LENGTH        (VALUE IS A CERTAIN NUMBER OF CHARACTERS)
// MINIMUM LENGTH
$value = "";
$min = 3;
if ( strlen($value) < $min ){
    echo "Validation Failed: STRING LENGTH TOO SHORT";
}

// STRING LENGTH        (VALUE IS A CERTAIN NUMBER OF CHARACTERS)
// MAXIMUM LENGTH
$value = "";
$max = 10;
if ( strlen($value) > $max ){
    echo "Validation Failed: STRING LENGTH TOO LONG";
}


// TYPE                 (IS INTEGER OR STRING ETC)
$value = "";
if ( !is_string($value)){
    echo "Validation Failed: NOT A STRING";
}


// INCLUSION IN A SET   (VALUE MUST BE A VALUE FROM A SET OF CHOICES EG MALE/FEMALE)
$value = "";
$set = array("1","2","3");
if ( !in_array($value, $set)){
    // Value does not exist in array
    // If $value is in the set it will pass, if not it will fail
    echo "Validation Failed: NOT IN SET";
}



// UNIQUENESS           (VALUE MUST BE UNIQUE)
// We ask the database if the value exists and if so raise an validation error



// FORMAT               (EMAIL MUST HAVE AN @ SYMBOL IN IT ETC)
// preg_match($regex, $subject)
// Must use / as the delimiter
// preg_match is like PatternCount
// IS CASE SENSITIVE

echo "</br></br>";

$value = "jason@streamtime.net";
if (preg_match("/@/", $value)){
    echo "Validation Succeeded";
} else {
    echo "Validation Failed";
}


?>



<html>
<head>
    <title>First Page</title>
</head>
<body>





</body>
</html>