<?php
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";


// --------------------->
// -- FORM PROCESSING -->
// --------------------->



if (!empty($_POST["submit"])) {
    // FORM HAS BEEN SUBMITTED

    // GET VALUES FROM THE POST
    $username = $_POST["username"];
    $password = $_POST["password"];

    // CHECK IF WE HAVE A ADMIN RECORD MATCHING USERNAME AND PASSWORD ENTERED
    $found_admin = attempt_login($username, $password);

    if ( $found_admin ) {
        // AUTHENTICATION SUCCESSFUL
        // MARK USER AS LOGGED IN
        // STORE THE ADMIN RECORD'S ID IN THE SESSION
        $_SESSION["admin_id"] = $found_admin["id"];
        $_SESSION["username"] = $found_admin["username"];
        redirect_to("admin.php");
    } else {
        // AUTHENTICATION FAIL
        redirect_to("login.php");
    }
}

?>


<?php
// SET THE LAYOUT CONTEXT FOR THE HEADER
$layout_context = "admin";
// INCLUDE HEADER HTML
include "../includes/layouts/header.php";
?>





<div id="main">

    <div id="navigation">
        <!-- NO NAV HERE -->
    </div>


    <div id="page">
        <?php echo $_SESSION["username"] ?>
        <h3>Login to Admin Area</h3>
        </br>

        <form action="login.php" method="post">
            <!-- USERNAME TEXT FIELD -->
            <p>Username: <input type="text" name="username" value="" /></p>
            <!-- USERNAME TEXT FIELD -->
            <p>Password: <input type="password" name="password" value="" /></p>
            </br>
            <!-- SUBMIT BUTTON -->
            <input class="button" name="submit" type="submit" value="Login" />
        </form>

    </div>

</div>

<?php
// INCLUDE FOOTER HTML
include "../includes/layouts/footer.php";
?>
