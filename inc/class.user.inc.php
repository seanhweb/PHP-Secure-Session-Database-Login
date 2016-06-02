<?php
class user {
	protected $dbh; 
	public function __construct() {
		$this->dbh = db_loader::connect();
	}
    public function create($username, $password) {
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;
        $hash = crypt($password, $salt);
        if($this->does_exist($username) == true) {
            header('Location: '.SITE_ROOT);
            exit();
        } 
        if($this->does_exist($username) == false) {
            $insert = $this->dbh->prepare("INSERT INTO `users` (`uid`,`username`,`password`, `role`) VALUES ('', :username, :password, '1')");
            $insert->bindValue(':username', $username, PDO::PARAM_STR);
            $insert->bindValue(':password', $hash, PDO::PARAM_STR);
            $insert->execute();       
            if($session->isLoggedIn() == false) {
                $this->login($username, $password);
            }
        } 
    }
    public function login($username, $password) {
        $sth = $this->dbh->prepare("SELECT password from users WHERE username = :username LIMIT 1");
        $sth->bindParam(':username',$username);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_OBJ);
        foreach($this->dbh->query("SELECT uid FROM users WHERE username = '$username'") as $row) {
            $user_id = $row['uid'];
        }
        if ( crypt($password, $user->password) === $user->password) {
            $session = new session();
            $session->begin_database_session($username,$user_id);
            //password matches, process in session
        }
        else {
			header('Location: '.WEB_ROOT.'?error'); 
        }
    }
    private function does_exist($username) {
        $exists = $this->dbh->query("SELECT username from users WHERE username = '$username'")->rowCount();
        if($exists >= 1) {
        	return true;   
        }
        else {
        	return false;   
        }
    }
	public function fetch_details() {
		$stmt = $this->dbh->prepare("SELECT fullname, email FROM users WHERE `uid` ='$_SESSION[USER_ID]'");
		$stmt->execute(); 
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		return $result[0];
	}
}
?>