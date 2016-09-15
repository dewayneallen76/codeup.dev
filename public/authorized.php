<?php 
session_start();
require_once '/vagrant/sites/codeup.dev/auth.php';
require_once '/vagrant/sites/codeup.dev/input.php';
require_once '/vagrant/sites/codeup.dev/log.php';

Auth::check();
Auth::user();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Authorized</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css">

</head>
<body>
	<div class="container text-center">
		<h1>AUTHORIZED USER: <?= $_SESSION['logged in user']; ?></h1>
		<br>
		<a class="btn btn-default" href="/logout.php" role="button">Logout</a>
	</div>
</body>
</html>