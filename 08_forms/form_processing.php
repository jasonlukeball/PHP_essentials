<?php

echo "<pre>";
echo print_r($_POST);
echo "</pre>";




// Output the values
$username = $_POST["username"];
$password = $_POST["password"];

echo "</br></br>";

echo "Username was: {$username}";
echo "</br>";
echo "Password was: {$password}";
