<?php








// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";


if (!empty($_POST["submit"])) {

    // FORM WAS SUBMITTED
    // PROCESS THE FORM

    // GET VALUES FROM THE $_POST

    $subject_id = $_POST["subject_id"];
    $menu_name = mysqli_real_escape_string($connection, $_POST["menu_name"]);
    $position = $_POST["position"];
    $visible = $_POST["visible"];
    $content = mysqli_real_escape_string($connection, $_POST["content"]);







    // BEGIN DATABASE QUERY
    // DEFINE QUERY
    $query = "INSERT INTO pages (subject_id, menu_name, position, visible, content) VALUES ({$subject_id},'{$menu_name}', {$position}, {$visible}, '{$content}')";

    // PASS THE QUERY TO MYSQL AND GET THE RESULT BACK
    $result = mysqli_query($connection, $query);

    // TEST IF THERE WAS A QUERY ERROR
    if ($result) {
        // QUERY SUCCEEDED
        // GO BACK TO MANAGE CONTENT PAGE
        // echo "SUCCEEDED";
        redirect_to("manage_content.php?subject={$subject_id}");

    } else {
        // QUERY FAILED
        // SOMETHING WENT WRONG WITH THE MYSQL INSERT

        // GO BACK TO NEW SUBJECT PAGE
        // echo "FAIL";
        redirect_to("new_page.php");

    }

} else {
    // SOMEONE IS PINGING THIS PAGE MANUALLY NOT COMING FROM A FORM
    redirect_to("new_page.php");
}




// CLOSE DATABASE CONNECTION
//mysqli_close($connection);