<html>
<head>
    <title>First Page</title>
</head>
<body>

<!-- Dynamic link to second page -->
<?php $linkName = "Second Page"; ?>
<a href="secondPage.php"><?php echo $linkName ?></a>
</br></br>
<a href="thirdPage.php?firstname=Jason&lastname=Ball">http://localhost/lynda_PHP/07_firstPages/secondPage.php?firstname=Jason&lastname=ball</a>

</br></br>

<?php $comapnyName = "Johnson & Johnson";?>

<a href="secondPage.php?companyName=<?php echo $comapnyName ?>">
    Sencon Page with companyName=Johnson & Johnson (FAILS DUE TO THE &)</a>


<!-- URL ENCODED -->
<!-- rawurlencode takes letters, numbers, underscores and dashes and passes them through a URL unchanged -->
<!-- reserved characters become % + their 2-digit hexadecimal equivalent (Eg the & character becomes %26) -->
<!-- Spaces become %20 -->

</br></br>
<a href="secondPage.php?companyName=<?php echo rawurlencode($comapnyName) ?>">
    Sencon Page with companyName=Johnson & Johnson (URLENCODED)</a>



</body>
</html>




