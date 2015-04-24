<?php

// ------------------------------
// CREATE DATABASE CONNECTION
// ------------------------------

define ("DB_SERVER",    "127.0.0.1");
define ("DB_USER",      "widget_cms");
define ("DB_PASS",      "password");
define ("DB_NAME",      "widget_corp");


$connection = mysqli_connect (DB_SERVER, DB_USER, DB_PASS, DB_NAME);


if(mysqli_connect_errno()){
// If connection failed, Display the error message and error number
// die is like halt script
// Get Connection Error Message     mysqli_connect_error()
// Get Connection Error Number      mysqli_connect_errno()
    die ("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}