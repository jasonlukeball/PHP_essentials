<?php

// A SESSION IS A FILE THAT'S STORED ON THE WEB SERVER IN THE WEB SERVER'S FILE SYSTEM
// YOU CAN STORE A LOT MORE INFORMATION ABOUT A USER IN THE SESSION FILE THAN YOU CAN IN A COOKIE

// WHEN WE WANT TO SAVE INFORMATION ABOUT THE USER WE SAVE IT IN THE SESSION AND THEN REFERENCE THE SESSION IN THE COOKIE

// THEN EVERY REQUEST THEY MAKE TO THE WEB SERVER AFTER THAT, THEY SEND THAT SESSION REFERENCE
// THE WEB SERVER LOOKS UP THE SESSION FILE AND PULLS THE INFORMATION OUT OF IT

// COOKIES ARE STORED CLIENT SIDE
// SESSIONS ARE STORED SERVER SIDE


// PROS

// COOKIES CAN ONLY STORE 4000 CHARACTERS
// SESSIONS ARE ONLY LIMITED BY SERVER HARD DRIVE SPACE
// SMALLER REQUEST SIZES


// CONS
// SLOWER TO ACCESS COMPARED TO COOKIES (SESSIONS ARE NOT STORED LOCALLY!)
// SESSIONS EXPIRE WHENEVER THE BROWSER IS CLOSED BUT THE SESSION FILE STILL REMAINS ON THE SERVER


session_start();
// Initiate a session,
// if no session file exists on the server, create one and store a reference in our cookie
// if session file (and cookie) exists then grab the data from our existing session file

// SET VALUES INTO THE SESSION FILE
$_SESSION["firstName"] = "Jason";
$_SESSION["lastName"] = "Ball";


// GET ALL VALUES FROM THE SESSION FILE
echo "<pre>";
echo print_r($_SESSION);
echo "</pre>";


echo "</br></br>";

// GET INDIVIDUAL VALUES FROM SESSION FILE
$fullName = $_SESSION[firstName] . " " . $_SESSION[lastName];
echo $fullName;


