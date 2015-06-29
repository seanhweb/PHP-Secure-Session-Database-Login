<?php
include('inc/classes.inc.php');
$session = new session;
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
    <title>FNX Web Administration</title>  
     <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/1200.css" media="screen and (min-width: 1220px)" rel="stylesheet" type="text/css">
    <link href="css/860.css" media="screen and (max-width: 970px)" rel="stylesheet" type="text/css">
    <link href="css/600.css" media="screen and (max-width: 760px)" rel="stylesheet" type="text/css">
    <link href="css/400.css" media="screen and (max-width: 560px)" rel="stylesheet" type="text/css">

</head>
<body>
<?php include('inc/views/nav.php'); ?>
    <div class="container" id="content">
        <div class="grid-primary">
            <?php if($_SESSION['username']) {
            header('Location:http://fnx.org/secure/survey');
            }
            ?>
            
                <?php include('inc/views/login-form.php'); ?>
                <?php if ($_SESSION['username']): ?>
                    <h2>Options</h2>
                    <div class="container">
                        <?php include('inc/views/options.php'); ?>
                    </div>
                <?php endif; ?>
        </div>
        <div class="grid-secondary">

        </div>
    </div>
    
</body>

</html>