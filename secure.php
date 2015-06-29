<?php
include('inc/classes.inc.php');
$session = new session;
$session->check();
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
                    <h3>Logged In!</h3>
                </div>
            </nav>
        </div>
    </header>
    <div class="container" id="content">
        <div class="grid-primary">
            <h2>Logged In!</h2>
            <div class="container">
                <p>This is a secure page that is only accessible if you are logged into the site. You are redirected to this page if you are still logged in. To log out, click "Logout".</p>
            </div>
        </div>
        <div class="grid-secondary">
            <h2>Log Out</h2>
            <div class="container">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</body>

</html>