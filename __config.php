<?php

ini_set('display_errors', '1');
define("DOMAIN", "http://localhost/plan1");

// Database connection

define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "plan1");

class DBConnector {
	public static function connect() {
		try {
			$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USERNAME, PASSWORD);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		} catch (PDOExeption $e){
			echo "Connection failed: ".$e->getMessage();
		}
	}
}