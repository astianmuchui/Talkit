
<body style="color: chartreuse; font-family: arial; background-color: black;">
<!-- Styling was not necessary -->
<center>
<?php

//How to use
# Include the Classes file
include "../easy-sequel/src/main.php";
// Create a class extending the sql_server class

class fetch extends sql_server{
   // define the table and the database name
   protected $dbname = "test";
   protected $table = "posts";

   public function test(){
      $this->fetch_all_assoc($this->dbname,$this->table);
      //The associative array returned has a variable name of data
      //Test if an arr was returneda
      var_dump($this->data);


      //Loop through the array

      // foreach($this->data as $item):
      //    print($item['index']);
      // endforeach;


   }
}
// Initialize the object
$db_acess = new fetch;

//Run the functions
$db_acess->test();
?>
</center>
</body>
