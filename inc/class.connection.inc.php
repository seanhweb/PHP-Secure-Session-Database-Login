<?php
define("USERNAME", "secure_demo");
define("PASSWORD", "hackme");

class connection {
    public function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=secure_demo;charset=utf8',USERNAME,PASSWORD );
    }  
}
?>