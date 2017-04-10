<?php 

require __DIR__ . '/db-connection.php';

$insert = 'INSERT INTO roles (name) VALUES (\'admin\')';

$dbc->exec($insert);

 ?>