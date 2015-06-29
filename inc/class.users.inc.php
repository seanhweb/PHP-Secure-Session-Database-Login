<?php


class users {

    public $exists;
    
    public function __construct() {
        $this->conn = new connection;   
    }
    
    
    public function create($username, $password) {
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;
        $hash = crypt($password, $salt);
        
        if($this->doesExist($username) == false) {
            $insert = $this->conn->db->prepare("INSERT INTO `users` (`uid`,`username`,`password`) VALUES ('', :username, :password)");
            $insert->bindValue(':username', $username, PDO::PARAM_STR);
            $insert->bindValue(':password', $hash, PDO::PARAM_STR);
            $insert->execute();                                       
        }
        
        if($this->doesExist($username) == true) {
         header('Location: https://seanhweb.com/secure-demo?userexists');   
        }
    }
    
    
    public function login($username, $password) {
        $sth = $this->conn->db->prepare("SELECT password from users WHERE username = :username LIMIT 1");
        $sth->bindParam(':username',$username);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_OBJ);
        
        foreach($this->conn->db->query("SELECT uid FROM users WHERE username = '$username'") as $row) {
            $user_id = $row['uid'];
        }
        
        
        if ( crypt($password, $user->password) === $user->password) {
            $session = new session;
            $session->processLogin($username,$user_id);
            //password matches, process in session
        }
        
        
        else {
         header('Location: https://seanhweb.com/secure-demo/secure.php');   
        }
    }
        
        
    
    
    
    private function doesExist($username) {
        $exists = $this->conn->db->query("SELECT username from users WHERE username = '$username'")->rowCount();
        if($exists >= 1) {
         return true;   
        }
        else {
         return false;   
        }
    }
}

?>