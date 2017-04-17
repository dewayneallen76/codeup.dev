<?php 
// Create a file in your exercises directory called Log.php
class Log 
{
// A property called $filename where you store the name of the file for the log.
	// limit the visibility of the $handle and $filename properties. (VISIBILITY EXERCISES, PHP IV)
	private $filename;
	private $handle;

// Add a constructor to your Log class.
// Take in a parameter called $prefix. If nothing is passed to the constructor, the $prefix should default to 'log'.
	public function __construct($prefix = 'log') 
	{
		$this->setFilename($prefix);
		$this->setHandle($prefix);
	}
// Set the $filename property of the class to $prefix-YYYY-MM-DD.log.
	private function setFilename($prefix) 
	{
		$this->filename = $prefix . "-". date("Y-m-d") . ".log";
		if (!touch($this->filename)) { // check to see if the file is readable
			echo 'File is not readable', PHP_EOL;
			exit;
		} 
		if(!is_writable($this->filename)) { // check to see if the file is writable
			echo 'File is not writable', PHP_EOL;
			exit;
		}
	}
// Open the $filename for appending and assign the file pointer to the property $handle
	private function setHandle($prefix) 
	{
		$this->handle = fopen($this->filename, 'a');
	}

// Add a destructor to close $handle when the class is destroyed.
	public function __destruct() 
	{
		fclose($this->handle);
	}
// Update logMessage(); it should no longer need to open and close its own file handle, instead use the $handle property.
	private function logMessage($logLevel,$message) 
	{
    	$addMessage = date("Y-m-d  h:i:s") . " " . "[$logLevel]" ." " . $message;
    	fwrite($this->handle, $addMessage . PHP_EOL);
  
    	return $addMessage;
	}
// Methods info() and error() that will take in a message and forward it on to logMessage() along with the relevant log level.
	public function info($message) 
	{
		$this->logMessage('INFO', $message);
	}

	public function error($message) 
	{
		$this->logMessage('ERROR', $message);
	}
}


 ?>