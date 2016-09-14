<?php 
date_default_timezone_set('America/Chicago');
require_once '/vagrant/sites/codeup.dev/log.php';
class Auth 
{

	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

	public static function attempt($username, $password) 
	{
			if($username == 'guest' && password_verify($password, Auth::$password) == 'password') {
				header("Location: /authorized.php");
				$_SESSION['logged in user'] = $username;
				$newFile = new Log();
				$newFile->filename = "log-" . date('Y-m-d') . '.log';
				$newFile->info("User {$username} successfully logged in with {$password}");
				die;
			} else {
				$newFile = new Log();
				$newFile->filename = "log-" . date('Y-m-d') . '.log';
				$message = "Login Failed. Try Again";
			}
	}

	public static function check() 
	{
		if(!empty($_SESSION)) {
			if($_SESSION['logged in user'] != 'guest') {
				header("Location: /login.php");
				return true;
				die;
			}else {
				return false; 
			}
		}		
	}

	public static function user() 
	{
		if(isset($_SESSION['logged in user'])) {
			return $_SESSION['logged in user'];
		} 
	}

	public static function logout() 
	{
    	session_unset();
    	session_destroy();
    	session_regenerate_id();
    	session_start();
	}
}

 ?>