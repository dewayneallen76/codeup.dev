<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
       	if(isset($_REQUEST[$key])) {
		return true;
		} else {
		return false; 
		}
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if(isset($_REQUEST[$key]) == true){
		return $_REQUEST[$key];
		} else {
		return null;
		}
    }

    // Update your Input class with two new methods: (PHP IV : Exceptions (Throwing))
    // public static function getString($key)
    public static function getString($key) 
    {
        if(! self::has($key))  
        {
            throw new Exception("Request does not have a key: '$key'"); 
        }
        $value = self::get($key);
        if (gettype($value) != 'string') {
            throw new Exception("Value at index '$key' is not a string!")
        }
        return $value;
    }
    // public static function getNumber($key)
    public static function getNumber($key) 
    {
        if(! self::has($key))  
        {
            throw new Exception("Request does not have a key: '$key'"); 
        }
        $value = self::get($key);
        if (! is_numeric($value) {
            throw new Exception("Value at index '$key' is not a number!")
        }
        return $value;
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
