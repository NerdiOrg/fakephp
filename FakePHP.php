<?php
class FakePHP {
  
 public function run($code){
   if(is_array($code)){ // accept blocks of code 
     foreach($code as $codeblock){
      $this->run($codeblock);  
     }
   } else if(is_string($code)){
     $this->execute($code);
   }
 }

 public function execute($string){
   //echo "the string is".$string;
   $string = trim($string);
   if(strpos($string, "\n") !== -1){
     $lines = explode("\n",$string);
     //print_r($lines);
     $linemax = count($lines);
     $linecount = 0;
     $skipnext = false;
     foreach($lines as $line){
      if(strpos($line, "s ") === 0){
        $sayvalue = str_replace("s ", "", $line);
        if($linecount != $linemax-1 && !$this->startswithcommand($lines[$linecount + 1])){
            $sayvalue .= $this->endofline . $lines[$linecount+1];
        }
        $sayvalue = strpos($sayvalue, '/lb/') !== -1 ? str_replace("/lb/", $this->endofline, $sayvalue) : $sayvalue;
        //$endsay = $linecount < $linemax-1 ? $this->endofline  : ($linecount == 0 ? $this->endofline : "");
        echo $sayvalue; // . $endsay;
      }
      $linecount++;
     }
   } else {
      if(strpos($string, "s ") === 0){
        $sayvalue = strpos($string, '/lb/') !== -1 ? str_replace("/lb/", $this->endofline,$string) : $string;
        echo str_replace("s ", "", $sayvalue);
      }
   }
 }

 public function startswithcommand($string){
     $parts = explode(" ", $string);
     if(is_countable($parts) && count($parts) > 0){
        return $this->checkcommand($parts[0]);
     } else {
         return false;
     }
 }

 public function checkcommand($startcommand){
     if(in_array($startcommand, $this->commands)){
        return true;
     }
 }
  
 public function __construct(){
   $this->endofline = PHP_EOL; //"<br>"; // use PHP_EOL for console / server outputs
   $this->commands = [
    "s"
   ];
 }
  
}
?>
