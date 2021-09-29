<?php
function fakephp($string){
 $endofline = "<br>"; // use PHP_EOL for console / server outputs
//echo "the string is".$string;
 $lines = explode( "\n",$string);
 //print_r($lines);
 $linemax = count($lines);
 $linecount = 0;
 foreach($lines as $line){
  if(strpos($line, "s ") === 0){
    $sayvalue = str_replace("s ", "", $line);
    $endsay = $linecount < $linemax-1 ? $endofline  : "";
    echo $sayvalue . $endsay;
  }
  $linecount++;
 }
}
$code = "s Hello!
s How are you?";
fakephp($code);
?>
