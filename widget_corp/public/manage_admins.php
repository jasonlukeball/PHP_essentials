<?php
require_once "../includes/db_connection.php";
require_once "../includes/functions.php";
include "../includes/layouts/header.php";
?>





<!---------------->
<!-- NAVIGATION -->
<!---------------->
<div id="main">
    <div id="navigation">
        <!-- NO NAVIGATION IN THIS VIEW -->
    </div>

    <!------------------>
    <!-- PAGE CONTENT -->
    <!------------------>
    <div id="page">
        <h3>Manage Admins</h3>
        </br>

        <table style="width:100%">

            <col width="130">
            <col width="80">

            <tr>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
                // GET ALL ADMIN RECORDS
                $admin_set = get_all_admins();
                // LOOP THROUGH ADMIN RECORDS AND OUTPUT USERNAME, EDIT AND DELETE LINKS
                while($admin = mysqli_fetch_assoc($admin_set)) {
                    echo "<tr>";
                    echo "<td>" . $admin["username"] . "</td>";
                    echo "<td>" .
                        "<a href=\"edit_admin.php?admin={$admin["id"]}\">Edit</a>" .
                        "&nbsp&nbsp&nbsp" .
                        "<a href=\"delete_admin.php?admin={$admin["id"]}\">Delete</a>" .
                        "</td>";
                    echo "</tr>";
                }
            ?>

        </table>

        </br>
        <a href="create_admin.php">+ Create New Admin User</a>
        </hr>

    </div>

</div>



















