<?php
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";

// SET THE LAYOUT CONTEXT FOR THE HEADER
$layout_context = "admin";
// INCLUDE HEADER HTML
include "../includes/layouts/header.php";
?>

<?php

if (isset($_GET["subject"])) {
    // IF WE'VE PASSED A SUBJECT ID, GET IT
    $selected_subject_id = $_GET["subject"];
    // GET DATA FOR THIS SUBJECT FROM THE get_subject_by_id FUNCTION
    $current_subject = get_subject_by_id($selected_subject_id);
    // SET PAGE ID TO NULL
    $selected_page_id = null;

} elseif (isset($_GET["page"])) {
    // IF WE'VE PASSED A PAGE ID, GET IT
    $selected_page_id = $_GET["page"];
    // GET DATA FOR THIS PAGE FROM THE get_page_by_id FUNCTION
    $currentpage = get_page_by_id ($selected_page_id);
    // SET SUBJECT ID TO NULL
    $selected_subject_id = null;
} else {
    $selected_subject_id = null;
    $selected_page_id = null;
}

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
        <h3>Create Subject</h3>
        <!-- START CREATE NEW SUBJECT FORM -->
        <form action="create_subject.php" method="post">
            <!-- SUBJECT NAME TEXT FIELD -->
            <p>Subject Name: <input type="text" name="menu_name" value="" /></p>
            <!-- POSITION DROPDOWN MENU -->
            <p>Position:
                <select name="position">
                    <?php
                    // GET ALL SUBJECTS
                    $subject_set = get_all_subjects("admin");
                    // COUNT ALL SUBJECTS
                    $subject_count = mysqli_num_rows($subject_set);
                    // LOOP THROUGH ALL SUBJECTS AND OUTPUT THE VALUES AS OPTIONS FOR THE POSITION SELECTOR (DROPDOWN)
                    for ($count = 1; $count <= $subject_count + 1 ; $count++) {
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
            <!-- SUBMIT BUTTON -->
            <input class="button" name="submit" type="submit" value="Create Subject" />
        </form>
        <!-- END CREATE NEW SUBJECT FORM -->
        </br>
        <a href="manage_content.php">Cancel</a>
    </div>



    <?php
    // RELEASE SUBJECT DATA
    mysqli_free_result($subjectsresult);
    // CLOSE DATABASE CONNECTION
    mysqli_close($connection);
    ?>

</div>

<?php
// INCLUDE FOOTER HTML
include "../includes/layouts/footer.php";
?>
