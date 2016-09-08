<?php

echo 'hello from an external file!' .PHP_EOL;

$person1 = array('first_name' => 'Kristy', 'last_name' => 'Allen');
$person2 = array('first_name' => 'Lola', 'last_name' => 'Allen');
$person3 = array('first_name' => 'Dewayne', 'last_name' => 'Allen');
$test = [$person1, $person2, $person3];
var_dump($test);
print_r($test);
echo $test[0]['last_name'] .PHP_EOL;