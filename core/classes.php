<?php

class Database {
    private $dbname = "talkit_production";
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $pwd = "";   
    protected function connect(){
        $this->conn = null;
        try{
           $this->conn = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname,$this->dbuser,$this->pwd);
           $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }catch(PDOException $e){
           echo $e->getMessage();
        }
        return $this->conn;
     }
}        
class Operations extends Database{
    public function signup(){
        
    }
}
?>