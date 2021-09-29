<?php
require_once "FakePHP.php";
$fakephp = new FakePHP();

// COMMAND "s" : Performs an echo of anything after it, until another command is encountered
// A command must be the first thing on a new line, with nothing before it, and at least 1 space after it

// The line break between "Hello!" and "How are you?" is registered & will have a line break included in it:
$fakephp->run("s Hello!
How are you?"); 

// Also, you can use "/lb/"  to force a line break:
$fakephp->run("s /lb/Hello2 b!");


// Now we need to test the ability to process our code blocks, which is when you pass array(s) that contain individual strings of code... 
// You can see we test the overall array with 2 strings first, and then another array as the 3rd value and this subarray contains 6 string tests, and 1 more new sub array test
$fakephp->run(["s /lb/testing", "s (and)testing 2 new linebreak before/lb/", ["s testing sub array/lb/", "s test sub array 2/lb/", "s test new line
testing here after newline", "s 
test linebreak after empty first line/lb/", "s  extra space after 's' command before string", ["s hellloooo", "s /lb/ and there"]]]);


?>
