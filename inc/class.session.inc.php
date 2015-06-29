<?php
class session {
    public $user_id;
    public function __construct(){
        session_start();
        $this->conn = new connection;
    }

    public function isLoggedIn() {
        $unique_id = $_SESSION['UNIQUE_ID'];
        foreach($this->conn->db->query("SELECT unique_id FROM sessions WHERE unique_id = '$unique_id'") as $row) {
            if(!$row) {
                $this->destroy();   
            }
        }
        
        if($_SESSION['USER_ID']) {
         return true;   
        }
    }
    
    public function isAdministrator() {
        $unique_id = $_SESSION['UNIQUE_ID']; 
        foreach($this->conn->db->query("SELECT 
        users.role 
        FROM sessions 
        INNER JOIN users ON users.uid = sessions.user_id
        WHERE sessions.unique_id = '$unique_id'") as $row) {
            $user_role = $row['role'];
        }
        
        if($user_role !== '2') {
         return false;   
        }
        if($user_role == '2') {
         return true;   
        }
    }
    
    public function processLogin($username, $user_id) {
        $unique = substr(md5(rand()), 0, 30);
        $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']); 
        $_SESSION['UNIQUE_ID'] = $unique;
        $_SESSION['USER_ID'] = $user_id;
        $_SESSION['CREATE_TIME'] = $_SERVER['REQUEST_TIME'];

        $insert = $this->conn->db->prepare(
            "INSERT INTO `sessions` 
            (`id`,`unique_id`,`user_id`) 
            VALUES 
            ('',:unique_id, :user_id);");
        $insert->bindValue(':unique_id', $unique, PDO::PARAM_STR);
        $insert->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $insert->execute();
        header('Location: https://seanhweb.com/secure-demo/secure.php');
    }

    public function check() {
        $time = $_SERVER['REQUEST_TIME']; 
        $session_duration = 60; 
        
            $userquery = "SELECT unique_id FROM sessions WHERE user_id = '".$_SESSION['USER_ID']."'";
            foreach($this->conn->db->query($userquery) as $row) {
                $unique_id = $row['unique_id'];
            }
        //if session cookie does not match server generated cookie, redirect to home page
        if($_SESSION['UNIQUE_ID'] !== $unique_id) {
            $this->destroy();
        }
        
        //if inactive for longer than 60 seconds, re login 
        if (isset($_SESSION['CREATE_TIME']) && ($time - $_SESSION['CREATE_TIME'] > $session_duration)) {
            $this->destroy();
        }
        
        //if there is no user agent, ask to log in 
        if(!isset($_SESSION['HTTP_USER_AGENT'])) {
            $this->destroy();
        }
        
        //if the user agent does not match the one used to login, re login 
        if($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
                $this->destroy();
        }
        
        
        $page = $_SERVER['REQUEST_URI'];
        $update = $this->conn->db->prepare("UPDATE sessions SET page = :page WHERE unique_id = :unique_id ");
        $update->bindValue(':page', $page, PDO::PARAM_STR);
        $update->bindValue(':unique_id', $unique_id, PDO::PARAM_INT);
        $update->execute();
        session_regenerate_id(); 
    }

    public function destroy() {
        $delete = $this->conn->db->prepare("DELETE FROM sessions WHERE user_id = :user_id");
        $delete->bindValue(':user_id', $_SESSION['USER_ID'], PDO::PARAM_INT);
        $delete->execute();
        $_SESSION = array();
        session_destroy();
        session_unset();
        header('Location:https://seanhweb.com/secure-demo/?pleaselogin');
    }
    
    
}


?>