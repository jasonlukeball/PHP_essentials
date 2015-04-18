<html>
<head>
    <title>Second Page</title>
</head>
<body>



<pre>
    <!--  -->
    <?php
        // $_GET will generate an array with all the key value pairs after the ? in the URL
        // EG http://localhost/lynda_PHP/07_firstPages/secondPage.php?firstname=Jason&lastname=ball will generate the following
        /*

        Array
        (
            [firstname] => jason
            [lastname] => ball
        )

         */

        print_r($_GET);

        echo "</br></br>";

        // get a particular value using it's key
        $firstname = $_GET['firstname'];
        echo $firstname;

    ?>
</pre>




</body>
</html>

