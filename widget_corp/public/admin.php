<?php
    require_once "../includes/functions.php";
    include "../includes/layouts/header.php";
?>



<!---------------->
<!-- NAVIGATION -->
<!---------------->
<div id="main">
    <div id="navigation">
    </div>

    <!------------------>
    <!-- PAGE CONTENT -->
    <!------------------>
    <div id="page">
        <h3>Admin Menu</h3>
        <p>Welcome to the admin area.</p>
        <ul>
            <li><a href="manage_content.php">Manage Website Content</a></li>
            <li><a href="manage_admins.php">Manage Admin Users</a></li>
            <li><a href="manage_content.php">Logout</a></li>
        </ul>
    </div>


</div>


<?php
    include "../includes/layouts/footer.php";
?>
