<?php

// __DIR__ is a *magic constant* with the directory path containing this file.
// This allows us to correctly require_once Model.php, no matter where this file is being required from.
require_once __DIR__ . '/Model.php';

// protected static $table = null;

class User extends Model
{
    /** Insert a new entry into the database */
    protected function insert()
    {
        // @TODO: Use prepared statements to ensure data security
        $query = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        $stmt->bindValue(':name', $this->attributes['name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
        $stmt->execute();
        // @TODO: After the insert, add the id back to the attributes array
        //        so the object properly represents a DB record
        $this->attributes['id'] = self::$dbc->lastInsertID();
    }

    /** Update existing entry in the database */
    protected function update()
    {
        $query = 'UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id'
        $stmt = self::$dbc->prepare($query);
        // @TODO: Use prepared statements to ensure data security
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        $stmt->bindValue(':name', $this->attributes['name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);

        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements
        $query = 'SELECT * FROM users WHERE id = :id';

        $stmt = self::$dbc->prepare($query);
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        // @TODO: Store the result in a variable named $result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }

    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        self::dbConnect();
        
        // @TODO: Learning from the find method, return all the matching records
        $query = 'SELECT * FROM users';
        $stmt = self::$dbc->prepare($query);

        // @TODO: Store the result in a variable named $result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
        }
        return $instance;
    }

    public static function delete() 
    {
        $query = 'DELETE FROM users WHERE id = :id';
        $stmt = self::$dbc->perpare($query);

        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_INT);
        $stmt->execute();
    }
}

