<?php
include('classes.inc.php');


$username = $_POST['username'];
$password = $_POST['password'];

$user = new users;
$user->login($username,$password);

?>