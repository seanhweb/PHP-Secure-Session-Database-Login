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
The login function checks the database for the username and password. If all is well, it then runs the "begin_database_session" function, which redirects them to the post login page in your config.ph. 
##### Secure Pages
For every page you would like to be secure, include the following code.
````
$session = new session;
$session->update_session();
````
 When this code is executed, it checks the following. 
 	- Has it been longer than the defined session time? 
 	- Is there a valid user agent string? 
 	- Is the session unique ID the same as the servers? 
If any of these are false, it runs the "destroy session" function and asks the user to login again. 
