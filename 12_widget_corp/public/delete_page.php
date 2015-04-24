<?php


require_once "../includes/functions.php";
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";




If ( $pageID = $_GET["page"] ) {


    // GET PAGE RECORD FROM MYSQL - TEST THAT IT EXISTS
    $current_page = get_page_by_id($pageID);


    // WE MAY GET A RESULT BACK BUT THAT RESULT COULD BE AN ERROR
    // CHECK FOR A RESULT OF A VALID ID FROM SQL
    if ( $current_page["id"] ) {
        // WE HAVE THE ID OF A RECORD THAT EXISTS TO DELETE

        // SETUP DELETION QUERY
        $query = "DELETE FROM pages WHERE id = {$current_page["id"]}";

        // PASS THE QUERY TO SQL
        $result = mysqli_query($connection, $query);

        // TEST FOR DELETION ERRORS
        if ($result) {
            // QUERY SUCCEEDED
            // GO BACK TO MANAGE CONTENT
            redirect_to("manage_content.php");
        } else {
            // QUERY FAILED
            // GO BACK TO EDIT SCREEN FOR THIS SUBJECT
            redirect_to("edit_page.php?page={$current_page}");
        }


    } else {
        // NO VALID RECORD FOUND IN SQL
        redirect_to("manage_content.php");
    }



} else {

    // NO VALID ID PASSED IN $_GET
    redirect_to("manage_content.php");
}




















