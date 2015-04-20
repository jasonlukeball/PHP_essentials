<?php
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";



if (isset($_GET["subject"])) {
    // IF WE'VE PASSED A RELATED SUBJECT ID, GET IT
    $related_subject_id = $_GET["subject"];


} else {
   redirect_to("manage_content.php");
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
        <ul class="subjects">
            <?php
            // GET ALL SUBJECTS ORDERED BY POSITION
            // SQL QUERY IS DEFINED IN THE get_all_subjects function
            $subjectsresult = get_all_subjects("admin");
            // OUTPUT SUBJECTS INTO UNORDERED LIST WITH LINKS
            while($subject = mysqli_fetch_assoc($subjectsresult)) {
                echo "<a href=\"manage_content.php?subject={$subject["id"]}\"" ;
                if ( $subject["id"] == $selected_subject_id ) {
                    // STYLE THE SUBJECT WITH THE "selected" CLASS IF IT IS CURRENTLY SELECTED
                    echo "<li class=\"selected\">" . $subject["menu_name"] . "</li>";
                } else {
                    // NORMAL STYLING IF NOT SELECTED
                    echo "<li>" . $subject["menu_name"] . "</li>";
                }
                echo "</a>";
                // GET RELATED PAGES FOR EACH SUBJECT
                // SQL QUERY IS DEFINED IN THE get_pages_for_subject function
                $pagesresult = get_related_pages_for_subject($subject["id"], "admin");
                // OUTPUT RELATED PAGES INTO UNORDERED LIST
                while($page = mysqli_fetch_assoc($pagesresult)) {
                    echo "<ul class=\"pages\">";
                    echo "<a href=\"manage_content.php?page={$page["id"]}\"" ;
                    if ( $page["id"] == $selected_page_id ) {
                        // STYLE THE PAGE WITH THE "selected" CLASS IF IT IS CURRENTLY SELECTED
                        echo "<li class=\"selected\">" . $page["menu_name"] . "</li>";
                    } else {
                        // NORMAL STYLING IF NOT SELECTED
                        echo "<li>" . $page["menu_name"] . "</li>";
                    }
                    echo "</a>";
                    echo "</ul>";
                }
                // RELEASE PAGE DATA
                mysqli_free_result($pagesresult);
            }
            ?>
        </ul>
    </div>


    <div id="page">
        <h3>Create Page</h3>












        <!-- START CREATE NEW PAGE FORM -->
        <form action="create_page.php" method="post">

            <!-- SUBJECT_ID (FORIGN KEY) HIDDEN FIELD -->
            <input type="hidden" name="subject_id" value=<?php echo $related_subject_id?>>


            <!-- PAGE NAME TEXT FIELD -->
            <p>Page Name: <input type="text" name="menu_name" value="" /></p>
            <!-- POSITION DROPDOWN MENU -->
            <p>Position:
                <select name="position">
                    <?php
                    // GET RELATED PAGES BY SUBJECT ID
                    $pagesquery = "SELECT * FROM pages WHERE subject_id = {$related_subject_id}";
                    // STORE RESULT
                    $pagesresult = mysqli_query($connection, $pagesquery);
                    // COUNT RELATED PAGES
                    $page_count = mysqli_num_rows($pagesresult);


                    // LOOP THROUGH ALL PAGES AND OUTPUT THE VALUES AS OPTIONS FOR THE POSITION SELECTOR (DROPDOWN)
                    for ($count = 1; $count <= $page_count + 1 ; $count++) {
                        echo "<option value=\"{$count}\">{$count}</option>";
                    }
                    ?>
                </select>
            </p>
            <!-- VISIBLE? YES/NO RADIO BUTTON -->
            <p>Visible:
                <input type="radio" name="visible" value="0" /> No
                &nbsp;
                <input type="radio" name="visible" value="1" /> Yes
            </p>



            <p>
                Content:
                </br>
                <textarea name="content" rows="20" cols="80"></textarea>

            </p>







            <!-- SUBMIT BUTTON -->
            <input class="button" name="submit" type="submit" value="Create Page" />
        </form>
        <!-- END CREATE NEW SUBJECT FORM -->
        </br>
        <a href="manage_content.php">Cancel</a>
    </div>



    <?php
    // RELEASE SUBJECT DATA
    mysqli_free_result($pagesresult);
    // CLOSE DATABASE CONNECTION
    mysqli_close($connection);
    ?>

</div>

<?php
// INCLUDE FOOTER HTML
include "../includes/layouts/footer.php";
?>
