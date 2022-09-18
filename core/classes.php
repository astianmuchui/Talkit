<?php
session_start();
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
   protected $key = '$2y$10$Lvh7toMVlSJjwmMHSZ5ULOWkFITbUuK6mr/NG2YKluolXTpI.lLbu';
   protected $pepper = '$2y$10$np7bVhRUeR5qQNDlAL.hOOvDaEwZdghmLpz8HjkVJnX0vJbmuyto2';
   protected $salt = '$2y$10$PYbF/lbCcZ5G4wK39svrRO0k2HM/rj.Iu8NqUxpcI01BmfIZq0J9e';
   public function user_exists($u){
      $q = "SELECT * FROM users WHERE `uname` = '$u' LIMIT 1";
      $result = mysqli_query(self::vanillaConnect(),$q);
      if(mysqli_fetch_assoc($result)){
         return true;
      }else{
         return false;
      }
      mysqli_close(self::vanillaConnect());
     }

   protected function aes_ctr_ssl_encrypt128($data){
      $method = $this->method;
      $enc_key = $this->key;
      $options = $this->options;
      $enc_iv = $this->enc_iv;
      $this->iv_length = openssl_cipher_iv_length($method);
      return openssl_encrypt($data,$method,$enc_key,$options,$enc_iv);
   }
   protected function aes_ctr_ssl_decrypt128($data){
      $method = $this->method;
      $enc_key = $this->key;
      $options = $this->options;
      $enc_iv = $this->enc_iv;
      return openssl_decrypt($data,$method,$enc_key,$options,$enc_iv);
   }
   public function signup($unm,$pwd){
        self::connect();
        $unm = self::escapeChar($unm);
        $pwd = self::escapeChar(trim($pwd));
        $this->hash = password_hash($pwd,PASSWORD_DEFAULT);
        $this->hash = $this->pepper.$this->hash.$this->salt;
        $this->encrypted_raw_name = self::aes_ctr_ssl_encrypt128($unm);
         if(self::user_exists($this->encrypted_raw_name) == false){
            $this->ins = $this->conn->prepare("INSERT INTO users (`uname`,`pwd`) VALUES(:unm,:pwd)");
            $this->ins->execute(['unm'=>$this->encrypted_raw_name,'pwd'=>$this->hash]);
         }else{
            $error = '
            <center>
            <div class="error" id="error">
                <span class="flex-column" id="close">&times;</span>
                <p class="err">Error: User Exists</p>
            </div>
        </center>
            ';
            print($error);
         }
    }
   public function login($um,$pd){
      self::connect();
      global $error;
      $this->raw_name = self::aes_ctr_ssl_encrypt128($um);
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
            $_SESSION['user'] = $row->id;
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
   public function search($str){
      self::connect();
      $this->stmt = $this->conn->prepare("SELECT * FROM `users`");
      $this->stmt->execute();
      if($rows = $this->stmt->fetchAll()){
            foreach($rows as $row){
                 $unm = $row->uname;
                 $readable = self::aes_ctr_ssl_decrypt128($unm);
                 if(stristr($readable,$str)){
                     $div = '
                     <div class="chat">
                     <img src="../UI/img/avatar.png" alt="" height="30px" width="30px">
                     <div class="text">
                         <a  href="#" class="h">'.$readable.'</a> <br>
                         <small>Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                     </div>
                 </div>
                        ';
                     print $div;
                 }
            }
      }
   }
}
?>
