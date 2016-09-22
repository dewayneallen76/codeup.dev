<?php 
define ('DB_HOST', 'mysql:host=127.0.0.1');
define ('DB_NAME', 'dbname=parks_db');
define ('DB_USER', 'parks_user');
define ('DB_PASS', 'parksrocks');

require('db_connect.php');

$dbc->exec('DROP TABLE IF EXISTS national_parks;');

$tableCreate = 'CREATE TABLE national_parks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(240) NOT NULL,
	location VARCHAR(240) NOT NULL,
	date_established DATE NOT NULL,
	area_in_acres DOUBLE NOT NULL,
	PRIMARY KEY (id) 
)';
$dbc->exec($tableCreate);
?>