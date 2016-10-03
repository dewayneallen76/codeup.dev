<?php

// __DIR__ is a *magic constant* with the directory path containing this file.
// This allows us to correctly require_once Model.php, no matter where this file is being required from.
require_once __DIR__ . '/Model.php';

protected static $table = null;

class User extends Model
{
    /** Insert a new entry into the database */
    protected function insert()
    {
        // @TODO: Use prepared statements to ensure data security
        $columns = '';
        $value_placeholders = '';
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        foreach($this->attributes as $columns => $value) 
        {
            if($columns == '' && $value_placeholders == '') 
            {
                $columns .= $column;
                $value_placeholders .= ':' . $column;
            }
            else 
            {
                $columns .= ',' . $column;
                $value_placeholders .= ',:' . $column;
            } 
        }
        // @TODO: After the insert, add the id back to the attributes array
        //        so the object properly represents a DB record
        $query = "INSERT INTO " . static::table . " ({$columns}) VALUES ({$value_placeholders})";
    
        $stmt = self::dbc->prepare($query);

        foreach($this->attributes as $columns => $value) {
            $stmt->bindValue(':' . $column, $value, PDO::PARAM_STR);
        }

        $stmt->execute();

        $this->attributes['id'] = self::$dbc->lastInsertID();
    }

    /** Update existing entry in the database */
    protected function update()
    {
        $query = "UPDATE " . static::$table . " SET ";
        $first_value = true;
        // @TODO: Use prepared statements to ensure data security
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        if($key == 'id')
        {
            continue;
        }
        if($first_value) 
        {
            $first_value == false;
            $query .= $key . '= :' . $key;
        } 
        else 
        {
            $query .= ',' . $key . '= :' . $key;
        }

        $query .= ' WHERE id = :id';

        $stmt = self::$dbc->prepare($query);

        foreach($this->attributes as $key => $value) {
            $stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
        }

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
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';

        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        // @TODO: Store the result in a variable named $result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new static($result);
            $instance->attributes = $result;
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
        $query = 'SELECT * FROM ' . static::$table;

        $stmt = self::$dbc->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result) {
            $instance = new static($result);
            $instance->attributes = $result;
        }
        return $instance;

    }
}
