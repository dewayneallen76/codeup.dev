<?php 

require __DIR__ . '/db-connection.php';

// create query to insert
$insert = 'INSERT INTO roles (name) VALUES (\'admin\')';

// execute the query to insert
$dbc->exec($insert);

// create associative array to add multiple users
$users = [
    ['email' => 'jason@codeup.com',   'name' => 'Jason Straughan'],
    ['email' => 'chris@codeup.com',   'name' => 'Chris Turner'],
    ['email' => 'michael@codeup.com', 'name' => 'Michael Girdley']
];
// use a foreach loop to add users as individual user
foreach ($users as $user) {
    $query = "INSERT INTO users (email, name) VALUES ('{$user['email']}', '{$user['name']}')";

// execute the query 
    $dbc->exec($query);
// lastInsertId() method. This method will return the auto-generated ID of the previous insert command. We will use this function in particular when constructing relations between records.
    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}

 ?>