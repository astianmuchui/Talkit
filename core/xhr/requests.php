<?php
   $str = $_GET['search'];
   if($str){
      include "../core.php";
      $ops = new Operations;
      $ops->search($str);
   }
?>
