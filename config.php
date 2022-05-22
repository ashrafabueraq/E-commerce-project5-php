<?php

$servername = "localhost";
$database = "ecommerce";
$username = "root";
$password = "";

 $dsn = "mysql:host=$servername;dbname=$database";

try {
	$pdo = new PDO($dsn, $username, $password);

	
} catch (PDOException $e) {
	echo "somthing wrong we will solve the promblem as soon as we can ";
}


?>
