<?php
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";
// INCLUDE HEADER HTML
include "../includes/layouts/header.php";
?>


<?php

if (isset($_GET["subject"])) {
    // IF WE'VE PASSED A SUBJECT ID, GET IT
    $selected_subject_id = $_GET["subject"];
    // GET DATA FOR THIS SUBJECT FROM THE get_subject_by_id FUNCTION (SQL)
    $current_subject = get_subject_by_id($selected_subject_id);
    // SET PAGE ID TO NULL
    $selected_page_id = null;

} elseif (isset($_GET["page"])) {
    // IF WE'VE PASSED A PAGE ID, GET IT
    $selected_page_id = $_GET["page"];
    // GET DATA FOR THIS PAGE FROM THE get_page_by_id FUNCTION (SQL)
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
                $subjectsresult = get_all_subjects();
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
                    $pagesresult = get_related_pages_for_subject($subject["id"]);
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
        </br>
        <a href="new_subject.php">+ Add a subject</a>


    </div>


    <div id="page">

        <?php
        // OUTPUT DATA FOR THE SUBJECT OR PAGE
        if ($current_subject) {
            // SUBJECT SELECTED
            // OUTPUT MENU NAME FOR THIS SUBJECT
            echo "<h3>Manage Subject</h3>";
            echo "Menu Name: " . $current_subject["menu_name"];
            // ADD EDIT LINK LINKING TO THE CURRENT SUBJECT
            echo "</br></br>";
            echo "<a href=\"edit_subject.php?subject={$current_subject["id"]}\">Edit Subject</a>";
            echo "<hr>";


        } elseif ($currentpage) {
            // PAGE SELECTED
            // OUTPUT MENU NAME FOR THIS PAGE
            echo "<h3>Manage Page</h3>";
            echo "Menu Name: " . $currentpage["menu_name"];


        } else {
            echo "<h3>Manage Content</h3>";
            echo "Please select a Subject or Page.";
        }

        ?>
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
