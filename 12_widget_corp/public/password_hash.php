<?php
require_once "../includes/functions.php";
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";


// USERNAME ENTERED
$username = "jason";
// PASSWORD ENTERED
$password = "1234";

// SEARCH DATABASE FOR MATCHING USER
$admin = get_admin_by_username($username);

// IF MATCHING USER
if ( $admin ) {
    // CHECK PASSWORD ENTERED
    if ( password_verify($password, $admin["hashed_password"])) {
        // PASSWORD MATCH
        // AUTHENTICATION SUCCESSFUL
        echo "PASSWORD MATCHES";
    } else {
        // PASSWORD DOES NOT MATCH
        // AUTHENTICATION FAIL
        echo "PASSWORD FAIL";
    }
} else {
    // NO MATCHING USER
    echo "NO MATCHING USER";
}




