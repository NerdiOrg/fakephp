<?php
class FakePHP {
  
 public function run($code){
   if(is_array($code)){ // accept blocks of code 
     foreach($code as $codeblock){
      $this->run($codeblock);  
     }
   } else if(is_string($code)){
     
   }
 }
  
 public function __construct(){
   
 }
  
}
?>
