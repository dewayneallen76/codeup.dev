<?php 

require __DIR__ . '/db-connection.php';

$createUsersTable = 'CREATE TABLE if NOT EXISTS users (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	email VARCHAR(240) NOT NULL, 
	name VARCHAR(50) NOT NULL, 
	PRIMARY KEY (id)
	)';

$dbc->exec($createUsersTable);


// created a query to add a table with an error (missing comma in CREATE TABLE)
$createRolesTable = 'CREATE TABLE if NOT EXISTS roles (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT
	name VARCHAR(80),
	PRIMARY KEY (id)
	)';

$dbc->exec($createRolesTable);


 ?>