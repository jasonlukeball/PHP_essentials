<?php


/*

1. CREATE DATABASE CONNECTION
2. PREFORM DATABASE QUERY
3. USE RETURNED DATA (IF ANY)
4. RELEASE RETURNED DATA
5. CLOSE DATABASE CONNECTION

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

// Define our query
$query = "SELECT * FROM subjects";

// Pass the Query to MySQL & get the result
$result = mysqli_query($connection, $query);

// Test is there was a query error
if (!$result) {
    // QUERY FAILED
    // We didn't get a result back (this is not the same thing as getting 0 records back)
    die ("Query failed");
} else {
    // QUERY SUCCEEDED
    // CONTINUE & OUTPUT DATA
}


// ------------------------------
// 3. USE RETURNED DATA (IF ANY)
// ------------------------------

echo "<ul>";

while($row = mysqli_fetch_assoc($result)) {
    // output data from each row into associated array(s)
    // each time this loops through the MySQL result set it automatically increments the loop pointer
    // eg row 1,2,3

    // Get all data
    // var_dump($row);

    // Get data for individual column
    // Put into unordered list
    echo "<li>" . $row["menu_name"]  . "</li>";
}

echo "</ul>";


// ------------------------------
// 4. RELEASE RETURNED DATA
// ------------------------------
mysqli_free_result($result);



// ------------------------------
// 5. CLOSE DATABASE CONNECTION
// ------------------------------
mysqli_close($connection);