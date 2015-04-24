<?php

// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";


if (isset($_GET["subject"])) {
    // IF WE'VE PASSED A SUBJECT ID, GET THE DEFAULT PAGE TO LOAD
    // DEFAULT PAGE ARRAY
    $default_page_for_subject = get_default_page_for_subject ( $_GET["subject"] );
    // DEFAULT PAGE ID
    $default_page_id = $default_page_for_subject["id"];
    // REDIRECT TO THAT PAGE
    redirect_to("index.php?page={$default_page_id}");


} elseif (isset($_GET["page"])) {
    // IF WE'VE PASSED A PAGE ID, GET IT
    $selected_page_id = $_GET["page"];
    // GET DATA FOR THIS PAGE FROM THE get_page_by_id FUNCTION (SQL)
    $current_page = get_page_by_id ($selected_page_id);
    // SET SUBJECT ID TO NULL
    $selected_subject_id = null;

    if ($current_page["visible"] == 0 ) {
        redirect_to("index.php");
    }




} else {
    // A SUBJECT OR PAGE $_GET HAS NOT BEEN PASSED
    $selected_subject_id = null;
    $selected_page_id = null;

}

?>


<?php
// SET THE LAYOUT CONTEXT FOR THE HEADER
$layout_context = "public";
// INCLUDE HEADER HTML
include "../includes/layouts/header.php";
?>




<div id="main">


    <!---------------->
    <!-- NAVIGATION -->
    <!---------------->
    <div id="navigation">
        <ul class="subjects">
            <?php
            // GET ALL SUBJECTS ORDERED BY POSITION
            $subjectsresult = get_all_subjects("public");

            // OUTPUT SUBJECTS INTO UNORDERED LIST WITH LINKS
            while($subject = mysqli_fetch_assoc($subjectsresult)) {




                echo "<a href=\"index.php?subject={$subject["id"]}\"" ;
                if ( $subject["id"] == $selected_subject_id ) {
                    // STYLE THE SUBJECT WITH THE "selected" CLASS IF IT IS CURRENTLY SELECTED
                    echo "<li class=\"selected\">" . $subject["menu_name"] . "</li>";
                } else {
                    // NORMAL STYLING IF NOT SELECTED
                    echo "<li>" . $subject["menu_name"] . "</li>";
                }
                echo "</a>" . "</br>";





                // OUTPUT RELATED PAGES FOR CURRENT SUBJECT
                // IF SUBJECT IS SELECTED OR IF A PAGE IS SELECTED (SHOW RELATED SUBJECT'S PAGES)
                if (
                    $current_subject["id"] == $subject["id"] || $current_page["subject_id"] == $subject["id"]

                ) {
                    $pagesresult = get_related_pages_for_subject($subject["id"], "public");
                    // OUTPUT RELATED PAGES AS UNORDERED LIST
                    while($page = mysqli_fetch_assoc($pagesresult)) {
                        echo "<ul class=\"pages\">";
                        echo "<a href=\"index.php?page={$page["id"]}\"" ;
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
                } else {
                    // DO NOTHING

                }
            }
            ?>
        </ul>

        <a href="login.php">Admin Login</a>

    </div>


    <!------------------>
    <!-- PAGE CONTENT -->
    <!------------------>
    <div id="page">
        <?php
        // OUTPUT DATA FOR THE SUBJECT
        if ($current_subject) {
            // SUBJECT SELECTED
            // OUTPUT DATA FOR THIS SUBJECT
            echo "</br></br>";
            echo "<h4 id=\"h4PageCount\">" . $current_subject["menu_name"] . "</h4>";
            echo "</br>";



        } elseif ($current_page) {
            // PAGE SELECTED

            // OUTPUT PAGE CONTENT
            echo "<h3>" . $current_page["menu_name"] . "</h3>";
            echo "<h4 id=\"h4PageCount\">" . nl2br($current_page["content"]) . "</h4>";
            echo "</br>";



        } else {
            echo "</br></br>";
            echo "<h4 id=\"h4PageCount\">" . "Welcome!" . "</h4>";
            echo "</br>";
        }

        ?>
    </div>


    <!---------------->
    <!--- CLEAN UP --->
    <!---------------->

    <?php
    // RELEASE SUBJECT DATA
    mysqli_free_result($subjectsresult);
    // CLOSE DATABASE CONNECTION
    mysqli_close($connection);
    ?>

</div>


<!---------------->
<!---- FOOTER ---->
<!---------------->

<?php
// INCLUDE FOOTER HTML
include "../includes/layouts/footer.php";
?>
