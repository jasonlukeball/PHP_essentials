<?php


// PERKS OF SINGLE PAGE FORMS
// ALL FORM LOGIC IS IN ONE FILE
// MAKES IT EASY TO REDISPLAY ERRORS ON THE PAGE

    if (isset($_POST["Submit"])) {
        // Form was submitted
        // Get the username value to update the message
        $username = $_POST["username"];
        $message = "Logging in: {$username}";
    } else {
        // For has not been submitted yet
        $message = "Please Log In.";
    }
?>



<html>
<head>
    <title>First Page</title>
</head>
<body>

<!-- ECHO THE MESSAGE -->
<h3>
<?php echo $message; ?>
</h3>



<!-- Form submits to itself-->
<form action="singlePageForm.php" method="post">
    <!-- Form submits to itself-->
    Username: <input type="text" name="username" value="" />
    </br>
    Password: <input type="password" name="password" value="" />
    </br>
    </br>
    <input type="submit" name="Submit" value="SUBMIT!" />
</form>



</body>
</html>