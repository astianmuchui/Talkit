<?php
   if($_SERVER["REQUEST_METHOD"]!=="GET"){
      header("Location: ../../");
      exit;
   }else{

   if( isset($_GET['search'])){
      $str = $_GET['search'];
      include "../core.php";
      $ops = new Operations;
      $ops->search($str);
   }
   }

?>
