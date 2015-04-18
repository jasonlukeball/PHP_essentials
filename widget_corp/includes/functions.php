<?php

// REDIRECT TO SPECIFIED PAGE
function redirect_to($new_location) {
    header ("Location: " . $new_location );
    exit;
}

// ERROR CHECK QUERY
function confirm_query($result_set) {
    If (!$result_set) {
        die ("Query failed");
    }
}

// SQL QUERY TO GET ALL SUBJECTS
function get_all_subjects() {
    // GET THE CONNECTION VARIABLE AND MAKE IT GLOBAL
    global $connection;
    // GET ALL SUBJECTS ORDERED BY POSITION
    $subjectsquery = "SELECT * FROM subjects ORDER BY position ASC";
    // STORE RESULT
    $subjectsresult = mysqli_query($connection, $subjectsquery);
    // CHECK FOR ERRORS
    confirm_query($subjectsresult);
    // RETURN DATA FROM FUNCTION
    return $subjectsresult;
}

// SQL QUERY TO GET PAGES RELATED TO SUBJECT
function get_related_pages_for_subject ($subject_id) {
    // GET THE CONNECTION VARIABLE AND MAKE IT GLOBAL
    global $connection;
    // GET RELATED PAGES FOR EACH SUBJECT
    $pagesquery = "SELECT id, menu_name FROM pages WHERE visible = 1 AND subject_id = {$subject_id} ORDER BY position ASC";
    $pagesresult = mysqli_query($connection, $pagesquery);
    // CHECK FOR ERRORS
    confirm_query($pagesquery);
    // RETURN DATA FROM FUNCTION
    return $pagesresult;
}

// SQL QUERY TO GET SUBJECT BY ID
function get_subject_by_id($subject_id) {
    // GET THE CONNECTION VARIABLE AND MAKE IT GLOBAL
    global $connection;
    // ESCAPE CHARACTERS TO AVOID SQL INJECTION (HACKING)
    $safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
    // GET SUBJECTS BY ID
    $subjectquery = "SELECT * FROM subjects WHERE id = {$safe_subject_id} LIMIT 1";
    // STORE RESULT
    $subjectresult = mysqli_query($connection, $subjectquery);
    // CHECK FOR ERRORS
    confirm_query($subjectresult);
    // GET THE RETURNED SUBJECT RECORD AS AN ASSOCIATED ARRAY
    if ($subject = mysqli_fetch_assoc($subjectresult)) {
        // RETURN DATA FROM FUNCTION
        return $subject;
    } else {
        // RETURN NULL FROM FUNCTION
        return null;
    }
}

// SQL QUERY TO GET A PAGE BY ID
function get_page_by_id ($page_id) {
    // SQL QUERY TO GET PAGE BY ID

    // GET THE CONNECTION VARIABLE AND MAKE IT GLOBAL
    global $connection;
    // ESCAPE CHARACTERS TO AVOID SQL INJECTION (HACKING)
    $safe_page_id = mysqli_real_escape_string($connection, $page_id);
    // GET PAGE BY ID
    $pagequery = "SELECT * FROM pages WHERE id = {$safe_page_id} LIMIT 1";
    // STORE RESULT
    $pageresult = mysqli_query($connection, $pagequery);
    // CHECK FOR ERRORS
    confirm_query($pagequery);
    // GET THE RETURNED PAGE RECORD AS AN ASSOCIATED ARRAY
    if ($page = mysqli_fetch_assoc($pageresult)) {
        // RETURN DATA FROM FUNCTION
        return $page;
    } else {
        // RETURN NULL FROM FUNCTION
        return null;
    }

}


