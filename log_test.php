<?php 
// Set timezone so that file will write correctly 
date_default_timezone_set('America/Chicago');
// Create a log_test.php file in your exercises directory. At the top of log_test.php, be sure to require_once 'Log.php';
require_once __DIR__ .'/log.php';
// Create an instance of the Log class
// Update log_test.php; pass the prefix 'cli' to the class and do not manually set the $filename property. Test from the command line.
$NewInstance = new Log();
// Call the methods logMessage(), info(), and error() with to test the functionality of each.
$NewInstance->info("This is an info message.");
$NewInstance->error("This is an error message.");
 
 ?>