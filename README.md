# PHP-Secure-Session-Database-Login
This project was designed as a base template to secure information behind a login page of a website.

### User Configuration Options
Config options are held in config.php. 
* Web Root
  - Where a user is taken before logging in. 
* Post Login
  - Where a user taken upon a successful login attempt. 
* Session Duration 
  - How long it takes for a user to be asked to log in again. 

### Database 
This library uses two tables. Sessions, and users. The SQL file is available above. 

### Sample Usage
##### Logging In
On your index.php, you would create a log in form. The action, however you choose to execute it, is as follows. 
```
$user = new user; 
$user->login($username,$password);
```
The login function checks the database for the username and password. If all is well, it then starts a session. 
You can then check to see if the login was sucessful, and redirect them to a secure page. That logic shown is: 
````
if($session->is_logged_in() == true) {
	header('Location: '.POST_LOGIN); 
}
````
##### Secure Pages
For every page you would like to be secure, include the following code.
````
<?php
include('inc/classes.inc.php');
$session = new session;
$session->update_session();
?>
````
 When this code is executed, it checks the following. 
 	- Has it been longer than the defined session time? 
 	- Is there a valid user agent string? 
 	- Is the session unique ID the same as the servers? 
If any of these are false, it runs the "destory session" function and asks the user to login again. 
