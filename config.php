<?php
ob_start();

try {
	// $con = new PDO("mysql:dbname=heroku_2becae845a23420;host=us-cdbr-east-02.cleardb.com", "b0cd4d1d1ae86e", "46ed9a39");
	$con = new PDO("mysql:dbname=moodle;host=localhost", "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOExeption $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>