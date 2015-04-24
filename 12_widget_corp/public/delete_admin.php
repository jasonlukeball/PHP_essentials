<?php


require_once "../includes/functions.php";
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";




If ( $adminID = $_GET["admin"] ) {


    // GET ADMIN RECORD FROM MYSQL - TEST THAT IT EXISTS
    $current_admin = get_admin_by_id($adminID);


    // WE MAY GET A RESULT BACK BUT THAT RESULT COULD BE AN ERROR
    // CHECK FOR A RESULT OF A VALID ID FROM SQL
    if ( $current_admin["id"] ) {
        // WE HAVE THE ID OF A RECORD THAT EXISTS TO DELETE

        // SETUP DELETION QUERY
        $query = "DELETE FROM admins WHERE id = {$current_admin["id"]}";

        // PASS THE QUERY TO SQL
        $result = mysqli_query($connection, $query);

        // TEST FOR DELETION ERRORS
        if ($result) {
            // QUERY SUCCEEDED
            // GO BACK TO MANAGE CONTENT
            redirect_to("manage_admins.php");
        } else {
            // QUERY FAILED
            // GO BACK TO EDIT SCREEN FOR THIS SUBJECT
            redirect_to("edit_admin.php?admins={$current_admin}");
        }


    } else {
        // NO VALID RECORD FOUND IN SQL
        redirect_to("manage_admins.php");
    }



} else {

    // NO VALID ID PASSED IN $_GET
    redirect_to("manage_admins.php");
}




















