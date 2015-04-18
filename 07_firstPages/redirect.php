<?php

// 302 Redirects have two parts 1. A Status Code 2. A location (path) the the file we want to redirect to
// This is how you redirect to a new page



// Page can be a relative
header("Location: firstPage.php");
// OR absolute
header("Location: http://www.google.com");
exit;

