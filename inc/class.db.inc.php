<?php
	class db_loader {
		protected $dbh;	
		static function connect() {
			$dbh = new PDO('mysql:dbname='.DB_NAME.';host=localhost', DB_USER, DB_PASS);
			return $dbh;
		}
	}
?>