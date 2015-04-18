<?php
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";


if (!empty($_POST["submit"])) {

    // FORM WAS SUBMITTED
    // PROCESS THE FORM

    // GET VALUES FROM THE $_POST
    $menu_name = $_POST["menu_name"];
    // ESCAPE ANY POTENTIALLY DANGEROUS CHARACTERS FROM THE $menu_name STRING
    $menu_name = mysqli_real_escape_string($connection, $menu_name);
    $position = $_POST["position"];
    $visible = $_POST["visible"];

    // BEGIN DATABASE QUERY
    // DEFINE QUERY
    $query = "INSERT INTO subjects (menu_name, position, visible) VALUES ('{$menu_name}', {$position}, {$visible})";

    // PASS THE QUERY TO MYSQL AND GET THE RESULT BACK
    $result = mysqli_query($connection, $query);

    // TEST IF THERE WAS A QUERY ERROR
    if ($result) {
        // QUERY SUCCEEDED
            // GET THE ID OF THE LAST RECORD CREATED
            // $newSubjectID = mysqli_insert_id ( $connection );
        // STORE A RESULT MESSAGE IN THE SESSION
        $_SESSION["message"] = "Subject created!";
        // GO BACK TO MANAGE CONTENT PAGE
        redirect_to("manage_content.php");
    } else {
        // QUERY FAILED
        // SOMETHING WENT WRONG WITH THE MYSQL INSERT
        // STORE A RESULT MESSAGE IN THE SESSION
        $_SESSION["message"] = "Subject creation FAIL!";
        // GO BACK TO NEW SUBJECT PAGE
        redirect_to("new_subject.php");
    }

} else {
    // SOMEONE IS PINGING THIS PAGE MANUALLY NOT COMING FROM A FORM
    redirect_to("new_subject.php");
}


// CLOSE DATABASE CONNECTION
mysqli_close($connection);