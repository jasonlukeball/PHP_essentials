<?php
// GET FUNCTIONS FIRST SO WE CAN REDIRECT IF NEEDED
// INCLUDE FUNCTIONS PHP
require_once "../includes/functions.php";
// INCLUDE DATABASE CONNECTION PHP
require_once "../includes/db_connection.php";


// CHECK FOR A SUBJECT ID PASSED
if (isset($_GET["subject"])) {
    // IF WE'VE PASSED A SUBJECT ID, GET IT
    $selected_subject_id = $_GET["subject"];
    // GET DATA FOR THIS SUBJECT FROM THE get_subject_by_id FUNCTION
    $current_subject = get_subject_by_id($selected_subject_id);
    // SET PAGE ID TO NULL
    $selected_page_id = null;

} else {
    // NO SUBJECT PASSED
    // echo "NO SUBJECT ID";
    redirect_to("manage_content.php");
}



// <!--------------------->
// <!-- FORM PROCESSING -->
// <!--------------------->



if (!empty($_POST["submit"])) {

// FORM WAS SUBMITTED
// PROCESS THE FORM

// GET VALUES FROM THE $_POST
    $id         = $selected_subject_id;
    $menu_name  = mysqli_real_escape_string($connection, $_POST["menu_name"]);
    $position   = $_POST["position"];

    If ( $_POST["visible"] == "No" ) { $visible = 0; } else { $visible = 1; } ;




// BEGIN UPDATE
// DEFINE QUERY
    $query = "UPDATE subjects SET menu_name = '{$menu_name}', position = {$position}, visible = {$visible} WHERE id = {$id}";

// PASS THE QUERY TO MYSQL AND GET THE RESULT BACK
    $result = mysqli_query($connection, $query);

// TEST IF THERE WAS A QUERY ERROR
    if ($result) {
    // QUERY SUCCEEDED
    // GO BACK TO MANAGE CONTENT PAGE
    redirect_to("manage_content.php?subject={$selected_subject_id}");
    // echo "</br>" . "&nbsp" . "SUCCESS";
    //$current_subject = get_subject_by_id($selected_subject_id);

    } else {
    // QUERY FAILED
    // SOMETHING WENT WRONG WITH THE MYSQL INSERT
    // echo "</br>" . "&nbsp" . "FAIL";
    }

} else {
// NO POST VALUES, JUST CONTINUE & LOAD THE PAGE
}


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
    </div>



    <!------------------>
    <!-- PAGE CONTENT -->
    <!------------------>
    <div id="page">
        <h3>Edit Subject: <?php echo $current_subject["menu_name"] ?></h3>
        <?php echo $error ?>


        <!-- START EDIT SUBJECT FORM -->


        <form action="edit_subject.php?subject=<?php echo $current_subject["id"] ?>" method="post">




            <!-- SUBJECT NAME TEXT FIELD -->
            <p>Subject Name: <input type="text" name="menu_name" value="<?php echo $current_subject["menu_name"] ?>" /></p>
            <!-- POSITION DROPDOWN MENU -->
            <p>Position:
                <select name="position">
                    <?php
                    // GET ALL SUBJECTS
                    $subject_set = get_all_subjects();
                    // COUNT ALL SUBJECTS
                    $subject_count = mysqli_num_rows($subject_set);
                    // LOOP THROUGH ALL SUBJECTS AND OUTPUT THE VALUES AS OPTIONS FOR THE POSITION SELECTOR (DROPDOWN)
                    for ($count = 1; $count <= $subject_count + 1 ; $count++) {
                        if ($count == $current_subject["position"] ) {
                            // IF THIS POSITION = THE POSITION SET FOR THIS SUBJECT THEN SET IT TO "SELECTED"
                            echo "<option value=\"{$count}\" selected>{$count}</option>";
                        } else {
                            // JUST GET THAT POSITION TO ADD TO THE DROP DOWN LIST
                            echo "<option value=\"{$count}\">{$count}</option>";
                        }
                    }
                    ?>
                </select>
            </p>
            <!-- VISIBLE? YES/NO RADIO BUTTON -->
            <p>Visible:
                <?php
                if ( !$current_subject["visible"] ) {
                    // NOT VISIBLE
                    // DISPLAY NO (SELECTED)
                    echo "<input type=\"radio\" name=\"visible\" value=\"No\" checked/> No ";
                    echo "&nbsp;";
                    // DISPLAY YES (DESELECTED)
                    echo "<input type=\"radio\" name=\"visible\" value=\"\" /> Yes";
                } else {
                    // IS VISIBLE
                    // DISPLAY NO (DESELECTED)
                    echo "<input type=\"radio\" name=\"visible\" value=\"\" /> No";
                    echo "&nbsp;";
                    // DISPLAY YES (SELECTED)
                    echo "<input type=\"radio\" name=\"visible\" value=\"Yes\" checked/> Yes ";
                }
                ?>
            </p>


            <!-- SUBMIT BUTTON -->
            <input class="button" name="submit" type="submit" value="Save Changes" />
        </form>
        <!-- END EDIT SUBJECT FORM -->
        </br>
        <!-- CANCEL BUTTON -->
        <a href="manage_content.php">Cancel</a>
        &nbsp;
        <!-- DELETE BUTTON -->
        <a
            href="delete_subject.php?subject=<?php echo $current_subject["id"] ?>"
            style="color:red;"
            onclick="return confirm('Are tou sure?');"
            >Delete</a>
    </div>




    <!---------------->
    <!-- CLEAN UP ---->
    <!---------------->
    <?php
    // RELEASE SUBJECT DATA
    mysqli_free_result($subjectsresult);
    // CLOSE DATABASE CONNECTION
    mysqli_close($connection);
    ?>


</div>


<!---------------->
<!--- FOOTER ----->
<!---------------->
<?php
// INCLUDE FOOTER HTML
include "../includes/layouts/footer.php";
?>
