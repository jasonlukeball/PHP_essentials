<?php

require_once("validationFunctions.php");

$errors = array();

// $username = trim($_POST["username"]);
$username = trim("");
// This will fail because no value exists for username

if ( !has_presence($username)){
    $errors["username"] = "Username cannot be blank";
}













// Print errors
echo "<pre>";
echo print_r($errors);
echo "</pre>";