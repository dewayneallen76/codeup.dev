<?php 
// Create new file named Model.php
// Create a Model class
class Model2
{
	// An attributes property (array) that is not visible outside of the class
	protected $attributes = [];
	// A magic getter to retrieve values from the attributes array based on the key name, provided the key exists.
	public function __get($name) 
	{
		if(isset($this->attributes[$name])) {
			return $this->attributes[$name];
		}
		return null;
	}
	// A magic setter to create key/value pairs in the attributes array.
	public function __set($name, $value) 
	{
		$this->attributes[$name] = $value;
	}
	// Open your Model class from the previous lesson. Add a new protected static property named $table. 
	// (PHP IV: Late Static Binding)
	protected static $table = 'database table goes here'; 
	// In the Model class, add a static method named getTableName() that returns the value of the static 
	// property $table. (PHP IV: Late Static Binding)
	public static function getTableName() {
		return static::$table;
	}
}
// Test your new Model class by adding key/value pairs and retrieving them.
$test = new Model;
$test->name = 'Dewayne Allen';
$test->phone_number = '123456789';
$test->email = 'dallen@here.com';

var_dump($test);


 ?>