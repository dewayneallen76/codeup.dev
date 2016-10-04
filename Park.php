<?php 


class Park
{
	protected static $dbc;
	protected static function dbConnect()
    {
        if (!self::$dbc) {
            // @TODO: Connect to database
            self::$dbc = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);

            // Tell PDO to throw exceptions on error
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

}



 ?>