<?php
include('inc/classes.inc.php');
$username = $_POST['username'];
$password = $_POST['password'];
$user = new user;
$user->login($username,$password);
$session = new session; 
if($session->is_logged_in() == true) {
	header('Location: '.POST_LOGIN); 
}
?>