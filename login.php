<?php
include('inc/classes.inc.php');
$username = $_POST['username'];
$password = $_POST['password'];
$user = new user;
$user->login($username,$password);
?>