<?php 
date_default_timezone_set('America/Chicago');
require_once '/vagrant/sites/codeup.dev/log.php';
class Auth 
{

	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
// will take in a $username and $password. If the $username is guest and the $password matches the hashed password above then set the LOGGED_IN_USER session variable as before. Use the Log class to log an info message: "User $username logged in.". If either the username or password are incorrect then log an error: "User $username failed to log in!". You will need to use the PHP method password_verify() to check the password hash.
	public static function attempt($username, $password) 
	{
			$newFile = new Log();
			if($username == 'guest' && password_verify($password, Auth::$password) == 'password') {
				$_SESSION['logged in user'] = $username;
				$newFile->filename = "log-" . date('Y-m-d') . '.log';
				$newFile->info("{$username} successfully logged in.");
				header("Location: /authorized.php");
				die;
			} else {
				$newFile->filename = "log-" . date('Y-m-d') . '.log';
				$newFile->info("{$username} failed to login.");
				return false;
			}
	}
// will return a boolean whether or not a user is logged in.
	public static function check() 
	{
			if($_SESSION['logged in user'] != 'guest') {
				header("Location: /login.php");
				die;
				return true;
			}else {
				return false; 
			}		
	}
// will return the username of the currently logged in user.
	public static function user() 
	{
		if(isset($_SESSION['logged in user'])) {
			return $_SESSION['logged in user'];
		} 
	}
// will end the session
	public static function logout() 
	{
    	session_unset();
    	session_destroy();
    	session_regenerate_id();
    	session_start();
	}
}

 ?>