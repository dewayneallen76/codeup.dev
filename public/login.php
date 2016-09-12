<?php
session_start();
function pageController()
{
	// variables for message, username, and password
	$message = "";
	$username = (isset($_POST['username'])) ? $_POST['username'] : '';
	$password = (isset($_POST['password'])) ? $_POST['password'] : '';
	// check if the user is logged in and forward them to the authorized page
	if(!empty($_SESSION)) {
		if($_SESSION['logged in user'] == 'guest') {
			header("Location: /authorized.php");
			die;
		}
	} 
	// check both the username and password, if match direct to authorized page, if not show error message
	if(!empty($_POST)) {
		if($username == 'guest' && $password == 'password') {
			header("Location: /authorized.php");
			$_SESSION['logged in user'] = $username;
			die;
		} else {
			$message = "Login Failed. Try Again";
		}
	}
	return [
		'username' => $username,
		'password' => $password,
		'message'  => $message
	];
}
extract(pageController());
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
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
        <h4><?= $message;?></h4>
    	</form>
    </div>
</body>
</html>