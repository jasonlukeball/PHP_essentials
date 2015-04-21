<?php
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";

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
        <h3>Create Admin</h3>
        </br>

        <form action="create_admin.php" method="post">
            <!-- USERNAME TEXT FIELD -->
            <p>Username: <input type="text" name="username" value="" /></p>
            <!-- USERNAME TEXT FIELD -->
            <p>Password: <input type="text" name="password" value="" /></p>
            </br>
            <!-- SUBMIT BUTTON -->
            <input class="button" name="submit" type="submit" value="Create Admin" />
        </form>

        </br>

        <a href="manage_admins.php">Cancel</a>
    </div>

</div>

<?php
// INCLUDE FOOTER HTML
include "../includes/layouts/footer.php";
?>
