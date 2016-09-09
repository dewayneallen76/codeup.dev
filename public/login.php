<?php
$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

if(!empty($_POST) || !empty($_GET)) {
	if($username == 'guest' && $password == 'password') {
		header("Location: /authorized.php");
		die;
	} else {
		die ("Login Failed");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css">
</head>
<body>
	<div class ="container">
		<h1>Login:</h1>
    	<form method="POST">
        	<div class="form-group">
        		<label>Username:</label>
        		<input type="text" class="form-group" name="username" placeholder="Enter your username"><br>
        	</div>
        	<div class="form-group">
        		<label>Password:</label>
        		<input type="password" class="form-group" name="password" placeholder="Enter your password"><br>
        	</div>
        	<input class="btn btn-default btn-primary" type="submit">
    	</form>
    </div>
</body>
</html>