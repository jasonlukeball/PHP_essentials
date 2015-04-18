<?php


// Get our validation functions
require_once ("validationFunctions.php");
// Get our validate function
require_once ("redirectFunction.php");

// Initialize an empty $errors array
$errors = array();






if (isset($_POST["Submit"])) {
    // Form was submitted
    // Get the username value to update the message
    // Try to login . . .
    $username = $_POST["username"];
    $password = $_POST["password"];

    // -----------------
    // VALIDATIONS
    // -----------------

    // Is Username entered ?
    if ( !has_presence($username)){
        // No Username Entered
        $errors["username"] = "Please enter a username";
    }

    // Is Password Entered ?
    if ( !has_presence($password)){
        // No Password Entered
        $errors["password"] = "Please enter a password";
    }





    if ( empty($errors)) {
        // -----------------
        // PASSED VALIDATION
        // -----------------
        // Try to Authenticate
        if ( $username == "Jason" && $password == "jlb" ) {
            // Authentication Successful
            redirect_to("http://localhost/lynda_PHP/01_firstSteps/helloWorld.php");
        } else {
            // Authentication Failed
            $message = "Username/Password is incorrect";
        }
    }




} else {
    // Form has not been submitted yet
    $message = "";
}
?>



<html>
<head>
    <title>First Page</title>
</head>
<body>

</br>

<form action="form_with_validation.php" method="post">
    <!-- Form submits to itself-->
    Username: <input type="text" name="username" value="" /></br></br>
    Password: <input type="password" name="password" value="" /></br></br>

    <input type="submit" name="Submit" value="SUBMIT!" />
</form>




<pre>
    <?php print_r ($errors); ?>


</pre>

<p><?php echo ($message); ?></p>





</body>
</html>