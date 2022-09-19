<?php
   $str = $_GET['search'];
   if($str){
      include "../classes.php";
      $ops = new Operations;
      $ops->search($str);
   }
?>
