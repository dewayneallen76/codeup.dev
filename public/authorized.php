<?php 
session_start();
// added conditional if session user is not logged in to redirect to the login page 
if($_SESSION['logged in user'] != 'guest') {
	header("Location: /login.php");
	die;
}


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