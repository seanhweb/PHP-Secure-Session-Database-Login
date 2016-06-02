<?php
include('inc/classes.inc.php');
$session = new session;
$session->update_session();
?>

<html>
<head>
    <title>Seanhweb Secure Demo</title>  
</head>
<body>
     <h2>Logged In!</h2>
	<p>This is a secure page that is only accessible if you are logged into the site.</p>
</body>

</html>