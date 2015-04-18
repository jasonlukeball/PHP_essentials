<?php

// Comment
// setcookie($name, $value, $expire);
// REMEMBER: Setting cookies happens in the HTTP Header so it must be done BEFORE *any* HTML output
// Once a Cookie has been set, every request to localhost will contain this in the header


// SET COOKIE
$name = "test";
$value = 45;
$expire = time() + (60*60*24*7);                       // Current Time in UNIX Time Format + 1 week

setcookie($name, $value, $expire);

// UNSET COOKIE
// setcookie($name, null, null)

?>




<html>
<head>
    <title>Cookies</title>
</head>
<body>

<?php

// Output cookie values from array
echo "<pre>";
echo print_r($_COOKIE);
echo "</pre>";

// Get the "test" value from the array
// It's important to test if the exist first before referencing them

if ( isset($_COOKIE["test"])) {
    // Set the test value into the $test variable
    $test = $_COOKIE["test"];
    // Print the $test variable
    echo $test;
}



?>

</body>
</html>