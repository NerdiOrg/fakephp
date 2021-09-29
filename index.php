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
?>
