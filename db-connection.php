<?php 
require __DIR__ . '/constants.php';
$dbc = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);

try {
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// connection successful message
	echo $connection->getAttribute(PDO::ATTR_CONNECTION_STATUS), PHP_EOL;
} catch (PDOException $e) {
	echo $e->getMessage(), PHP_EOL;
}


 ?>