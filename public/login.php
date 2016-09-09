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
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
	<div class ="container">
		<h1>LOGIN:</h1>
    	<form method="POST">
        	<label>Username:</label>
        	<input type="text" name="username"><br>
        	<label>Password:</label>
        	<input type="password" name="password"><br>
        	<input type="submit">
    	</form>
    </div>
</body>
</html>