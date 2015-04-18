<?php


/*
The meaning of a while statement is simple. It tells PHP to execute the nested statement(s) repeatedly,
as long as the while expression evaluates to TRUE. The value of the expression is checked each
time at the beginning of the loop, so even if this value changes during the execution of the nested statement(s),
execution will not stop until the end of the iteration (each time PHP runs the statements in the loop is one iteration).
Sometimes, if the while expression evaluates to FALSE from the very beginning, the nested statement(s) won't even be run once.

Eg:

while (expression) {
    statement;
}


// "expression" is a boolean result, the condition is true or false


*/


$count = 0;
while ($count <= 10) {
    echo $count;
    $count ++ ;
}
echo "</br>" . "This iterated: {$count} times.";