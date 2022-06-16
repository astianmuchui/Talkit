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
   protected function vanillaConnect(){
      try{
         $this->db = mysqli_connect($this->dbhost,$this->dbuser,$this->pwd,$this->dbname);
      }catch(Exception $e){
         echo $e;
      }
      return $this->db;
   }  
   protected function escapeChar($var){
      self::vanillaConnect();
      $var = mysqli_real_escape_string($this->db,$var);
      return $var;
   }
}        
class Operations extends Database{
   protected $method = "AES-128-CTR";
   protected $options = 0;
   protected $enc_iv = '1234567891011121';
   protected $key = 29366464;
   protected $pepper = "~$:";
   protected $salt = "asascoud@$";
   public function signup($unm,$pwd){
        self::connect();
        $unm = self::escapeChar($unm);
        $pwd = self::escapeChar(trim($pwd));
        $this->hash = password_hash($pwd,PASSWORD_DEFAULT);
        $this->hash = $this->pepper.$this->hash.$this->salt;
        $this->iv_length = openssl_cipher_iv_length($this->method);
        $this->encrypted_raw_name = openssl_encrypt($unm,$this->method,$this->key,$this->options,$this->enc_iv);
        $this->ins = $this->conn->prepare("INSERT INTO users (`uname`,`pwd`) VALUES(:unm,:pwd)");
        $this->ins->execute(['unm'=>$this->encrypted_raw_name,'pwd'=>$this->hash]);      
    }  
   public function login($um,$pd){
      self::connect();
      global $error;
      $this->iv_length = openssl_cipher_iv_length($this->method);
      $this->raw_name = openssl_encrypt($um,$this->method,$this->key,$this->options,$this->enc_iv);
      $this->sr_qr = $this->conn->prepare("SELECT * FROM `users` WHERE `uname`= :uname");
      $this->sr_qr->execute(['uname'=>$this->raw_name]);
      if($row = $this->sr_qr->fetch()){
         //check password
         $crpwd = $row->pwd;
         $crpwd = str_replace($this->pepper,"",$crpwd);
         $crpwd = str_replace($this->salt,"",$crpwd);
         // Verify
         if(password_verify($pd,$crpwd)){
            // All okay
            header("Location: ../profile");
         }else{
            $error = '
            <center>
            <div class="error" id="error">
                <span class="flex-column" id="close">&times;</span>
                <p class="err">Invalid password</p>
            </div>
        </center>
            ';
         }
      }else{
         $error = '
         <center>
         <div class="error" id="error">
             <span class="flex-column" id="close">&times;</span>
             <p class="err">User not found</p>
         </div>
     </center>
         ';
      }
      return $error;
   } 
}

?>