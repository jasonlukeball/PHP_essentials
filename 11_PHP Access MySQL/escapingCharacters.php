<?php


/*

1. CREATE DATABASE CONNECTION
2. PREFORM DATABASE QUERY
3. CLOSE DATABASE CONNECTION

*/

// ------------------------------
// 1. CREATE DATABASE CONNECTION
// ------------------------------

$dbhost = "localhost";
$dbuser = "widget_cms";
$dbpass = "password";
$dbname = "widget_corp";
$connection = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbname);


if(mysqli_connect_errno()){
    // If connection failed, Display the error message and error number
    // die is like halt script
    // Get Connection Error Message     mysqli_connect_error()
    // Get Connection Error Number      mysqli_connect_errno()
    die ("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}



// ------------------------------
// 2. PREFORM DATABASE QUERY
// ------------------------------

// THIS WILL BREAK THE SQL QUERY UNLESS WE ESCAPE THE ' CHARACTER
$menu_name = "Today's Menu";
$position = 4;
$visible = 1;

// ESCAPE THOSE NASTY CHARACTERS!
$menu_name = mysqli_real_escape_string($connection, $menu_name);


// Define our query
$query = "INSERT INTO subjects (menu_name, position, visible) VALUES ('{$menu_name}', {$position}, {$visible})";

// Pass the Query to MySQL & get the result
$result = mysqli_query($connection, $query);

// Test is there was a query error
if ($result) {
    // QUERY SUCCEEDED
    // TELL ME THE ID OF THE NEW RECORD
    echo "Success! New record ID is: " . $id = mysqli_insert_id($connection);
} else {
    // QUERY FAILED
    die ("Query failed");

}


// ------------------------------
// 3. CLOSE DATABASE CONNECTION
// ------------------------------
mysqli_close($connection);