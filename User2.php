<?php 
require_once __DIR__ . '/Model.php';
// Create a new file name User.php. (PHP IV : Late Satic Binding)
// In this new file, create a User class that extends Model. (PHP IV : Late Static Binding)
// This class will be very simple, and will only contain the overridden $table property, set to users. (PHP IV Late Static Binding)
class User extends Model 
{
	protected static $table = 'users';
}
// Test your User class by calling User::getTableName(). Did it return the string users? YES
// In your parent Model class, did you use self:: or static::? static::
// Does switching them change the result? Yes, self returns the string set in the Model class
var_dump(User::getTableName()); 
 
 ?>
