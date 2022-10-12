<?php
   if($_SERVER["SERVER_REQUEST_METHOD"]!=="GET"){
      http_response_code(403);
      exit;


   }else{
   $str = $_GET['search'];
   if($str){
      include "../core.php";
      $ops = new Operations;
      $ops->search($str);
   }
   }

?>
