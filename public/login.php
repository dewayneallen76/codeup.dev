<?php
session_start();
require_once '/vagrant/sites/codeup.dev/auth.php';
require_once '/vagrant/sites/codeup.dev/input.php';
require_once '/vagrant/sites/codeup.dev/log.php';
function pageController()
{
	// variables for message, username, and password
	$log = [];
	$log['name'] = Input::get('username');
	$log['password'] = Input::get('password');
	$log['message'] = '';

	if(!empty($log['name']) || !empty($log['password'])) {
		Auth::attempt($log['name'],$log['password']);
		if ($log['name'] != 'guest' || $log['password'] != Auth::$password) {
			$log['message'] = 'Login failed.';
		}
	}
	
	Auth::user();
	return $log ;
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
        <h4><?= $message; ?></h4>
    	</form>
    </div>
</body>
</html>