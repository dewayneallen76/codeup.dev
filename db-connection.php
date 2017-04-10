<?php 

$connection = new PDO(
	'mysql:host=localhost; dbname=employees',
	'vagrant',
	'vagrant'
);

try {
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// connection successful message
	echo $connection->getAttribute(PDO::ATTR_CONNECTION_STATUS), PHP_EOL;
} catch (PDOException $e) {
	echo $e->getMessage(), PHP_EOL;
}


 ?>