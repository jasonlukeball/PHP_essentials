<html>
<head>
    <title>First Page</title>
</head>
<body>


<!-- POST DATA DOES NOT NEED TO BE ENCODED OR DECODED -->

<form action="form_processing.php" method="post">
    <!-- name= is the key and the value entered is the value -->
    Username: <input type="text" name="username" value="" />
    </br>
    Password: <input type="password" name="password" value="" />
    </br>
    </br>
    <input type="submit" name="Submit" value="SUBMIT!" />
</form>






<?php

// URLS ARE $_GET Requests
// FORMS are $_POST Requests

?>


</body>
</html>