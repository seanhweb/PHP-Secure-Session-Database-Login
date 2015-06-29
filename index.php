<?php
include('inc/classes.inc.php');
$session = new session;
if($session->isLoggedIn() == true) {
 header('Location:https://seanhweb.com/secure-demo/secure.php');   
}

?>

<html>
<head>
<script>
  document.createElement('header');
  document.createElement('section');
  document.createElement('article');
  document.createElement('aside');
  document.createElement('nav');
  document.createElement('footer');
</script>
    <title>Seanhweb Secure Demo</title>  
     <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/1200.css" media="screen and (min-width: 1220px)" rel="stylesheet" type="text/css">
    <link href="css/860.css" media="screen and (max-width: 970px)" rel="stylesheet" type="text/css">
    <link href="css/600.css" media="screen and (max-width: 760px)" rel="stylesheet" type="text/css">
    <link href="css/400.css" media="screen and (max-width: 560px)" rel="stylesheet" type="text/css">

</head>
<body>
    <header>
        <div class="container">
            <nav>
                <div class="grid-primary">
                    <h3>Please Log In</h3>
                </div>
            </nav>
        </div>
    </header>
    <div class="container" id="content">
        <div class="grid-primary">
            <h2>Log In</h2>
<div class="container">
<form action="inc/login.php" method="POST">
    <table>
        <tr>
            <th>Username</th>
            <td><input name="username" type="text"></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input name="password" type="password"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Go"></td>
        </tr>
    </table>
</form>
</div>
        </div>
        <div class="grid-secondary">
            <h2>Credentials</h2>
            <div class="container">
                <p>For the purposes of this demo, you can log in with the following credentials.</p>
                <ul>
                    <li>Username: demo</li>
                <ul>
                    <li>Password: demo</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>