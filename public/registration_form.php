<?php
    var_dump($_GET);
    var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Registration Form</title>
</head>
	<body>
	<hr>
	<h2>Registration Form</h2>
	<form method="POST" action="/registration_form.php">
	<p>
		<label for="firstname">First Name:</label>
		<input id="firstname" name="firstname" type="text">
	</p>
	<p>
		<label for="lastname">Last Name:</label>
		<input id="lastname" name="lastname" type="text">
	</p>
	<p>
		<label for="email">Email:</label>
		<input id="email" name="email" type="text">
	</p>
	<p>
		<label for="username" name="username">Username:</label>
		<input id="username" name="username" type="text">
	</p>
	<p>
		<label for="password" name="password">Password:</label>
		<input id="password" name="password" type="password">
	</p>
	<p>
		<label for="confirmpass" name="confirmpass">Confirm Password:</label>
		<input for="confirmpass" name="confirmpass" type="password">
	</p>
	<p>
		<label for="newsletter">Sign me up for the newsletter!</label>
		<input type="checkbox" id="newsletter" name="newsletter" value="yes" checked>
	</p>
	<p>
		<input type="submit" value="Submit">
	</p>
	<hr>
	</body>
</html>