<?php


$password = "test";

$password_hashed = password_hash($password, PASSWORD_DEFAULT);


$password_verified = password_verify($password, $password_hashed);




echo "PASSWORD: " . $password . "</br>";
echo "PASSWORD HASHED: " . $password_hashed . "</br>";


if ( $password_verified == 1 ) {
    echo "PASSWORD MATCHES";
} else {
    echo "PASSWORD DOES NOT MATCH";
}