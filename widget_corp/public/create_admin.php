<?php


// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";


if (!empty($_POST["submit"])) {

    // FORM WAS SUBMITTED
    // PROCESS THE FORM

    // GET VALUES FROM THE $_POST
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = password_encrypt($_POST["password"]);




    // BEGIN DATABASE QUERY
    // DEFINE QUERY
    $query = "INSERT INTO admins (username, hashed_password) VALUES ('{$username}', '{$password_hashed}')";

    // PASS THE QUERY TO MYSQL AND GET THE RESULT BACK
    $result = mysqli_query($connection, $query);

    // TEST IF THERE WAS A QUERY ERROR
    if ($result) {
        // QUERY SUCCEEDED
        // GO BACK TO MANAGE CONTENT PAGE
        // echo "SUCCEEDED";
        redirect_to("manage_admins.php");

    } else {
        // QUERY FAILED
        // SOMETHING WENT WRONG WITH THE MYSQL INSERT

        // GO BACK TO NEW SUBJECT PAGE
        echo "FAIL";
        echo $query;
        die;
        // redirect_to("new_admin.php");

    }

} else {
    // SOMEONE IS PINGING THIS PAGE MANUALLY NOT COMING FROM A FORM
    redirect_to("new_admin.php");
}




// CLOSE DATABASE CONNECTION
mysqli_close($connection);