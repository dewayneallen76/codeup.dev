<?php 
require __DIR__ . '/db-connection.php';

try {
	$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// connection successful message
	echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS), PHP_EOL;
} catch (PDOException $e) {
	echo $e->getMessage(), PHP_EOL;
}

 ?>