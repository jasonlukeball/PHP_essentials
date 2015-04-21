<?php
// GET FUNCTIONS FIRST SO WE CAN REDIRECT IF NEEDED
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";


// CHECK FOR A SUBJECT ID PASSED
if (isset($_GET["admin"])) {
    // IF WE'VE PASSED A ADMIN ID, GET IT
    $selected_admin_id = $_GET["admin"];
    // GET DATA FOR THIS PAGE FROM THE get_subject_by_id FUNCTION
    $current_admin = get_admin_by_id($selected_admin_id);

} else {
    // NO ADMIN PASSED
    redirect_to("manage_admins.php");
}


// <!--------------------->
// <!-- FORM PROCESSING -->
// <!--------------------->


if (!empty($_POST["submit"])) {

    // FORM WAS SUBMITTED
    // PROCESS THE FORM

    // GET VALUES FROM THE $_POST
    $id         = $selected_admin_id;
    $username   = mysqli_real_escape_string($connection, $_POST["username"]);
    $password   = password_encrypt($_POST["password"]);


    // BEGIN UPDATE
    // DEFINE QUERY
    $query = "UPDATE admins SET username = '{$username}', hashed_password = '{$password}' WHERE id = '{$id}'";

    // PASS THE QUERY TO MYSQL AND GET THE RESULT BACK
    $result = mysqli_query($connection, $query);

    // TEST IF THERE WAS A QUERY ERROR
    if ($result) {
        // QUERY SUCCEEDED
        // echo "SUCCESS". "</br>" . $query;
        // die;
        redirect_to("manage_admins.php");


    } else {
        // QUERY FAILED
        // echo "FAIL". "</br>" . $query;
        // die;
        redirect_to("manage_admins.php");
    }

} else {
// NO POST VALUES, JUST CONTINUE & LOAD THE PAGE
}

// SET THE LAYOUT CONTEXT FOR THE HEADER
$layout_context = "admin";
// INCLUDE HEADER HTML
include "../includes/layouts/header.php";
?>



<!------------------>
<!-- PAGE CONTENT -->
<!------------------>
<div id="main">

    <div id="navigation">
        <!-- NO NAV HERE -->
    </div>


    <div id="page">
        <h3>Edit Admin</h3>
        </br>

        <form action="edit_admin.php?admin=<?php echo $current_admin["id"] ?>" method="post">
            <!-- USERNAME TEXT FIELD -->
            <p>Username: <input type="text" name="username" value="<?php echo $current_admin["username"] ?>" /></p>
            <!-- USERNAME TEXT FIELD -->
            <p>Password: <input type="password" name="password" value="<?php echo $current_admin["hashed_password"] ?>" /></p>
            </br>
            <!-- SUBMIT BUTTON -->
            <input class="button" name="submit" type="submit" value="Save Changes" />
        </form>

        <!-- END EDIT SUBJECT FORM -->
        </br>
        <!-- CANCEL BUTTON -->
        <a href="manage_admins.php">Cancel</a>
        &nbsp;
        <!-- DELETE BUTTON -->
        <a
            href="delete_admin.php?admin=<?php echo $current_admin["id"] ?>"
            style="color:red;"
            onclick="return confirm('Are tou sure?');"
            >Delete</a>
    </div>
</div>


<!---------------->
<!--- FOOTER ----->
<!---------------->
<?php
// INCLUDE FOOTER HTML
include "../includes/layouts/footer.php";
?>
