<?php
include('inc/classes.inc.php');
?>

<html>
<head>
    <title>Seanhweb Secure Demo</title>  
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
     <h2>Log In</h2>
	<form action="login.php" method="POST">
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

</body>

</html>