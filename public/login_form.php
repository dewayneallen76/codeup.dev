<?php
    var_dump($_GET);
    var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Login Form</title>
</head>
	<body>
	<hr>
	<h2>Login Form</h2>
	<form method="POST" action="/login_form.php">
	<p>
		<label for="username">Login: </label>
			<input id="username" name="username" placeholder="Enter Username or Email" type="text">
	</p>
	<p>
		<label for="password">Password: </label>
			<input id="password" name="password" placeholder="Enter Password" type="password">
	</p>
	<p>
		<input type="submit" value="Submit">
		<input type="checkbox" id="remember" name="remember" value="yes">
		<label for="remember">Remember Me</label>
	</p>
	<hr>
	</body>
</html>