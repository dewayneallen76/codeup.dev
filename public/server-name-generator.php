<?php
// Function to create random name from $adjective array and from $noun array
function randomServerName($array) 
{ 	
$random = mt_rand(0,9);
return $array[$random];
}
// Added function to create random server name from both arrays 
function generator($element1, $element2) 
{
return randomServerName($element1) . " " . randomServerName($element2);
}
// refactored to add page controller, moved arrays to pageController function 
function pageController() {
$adjective = ['Amazing', 'Bumpy', 'Courageous', 'Droopy', 'Edible', 'Fabulous', 'Gargantuan', 'Hairy', 'Interesting', 'Jumpy'];
$noun = ['Tree', 'Airplane', 'House', 'Dog', 'Lizard', 'Camel', 'Rocket', 'Snake', 'Mouse', 'Baby'];	
	$data = [];
	$data['randomServerName'] = generator($adjective, $noun);
return $data;
}
extract(pageController());

?>
<!-- HTML for output -->
<!DOCTYPE html>
<html>
<head>
	<title>Server Name Generator</title>
</head>
<style>
	body {
		background-color: silver;
	}
	h1 {
		text-align: center;
		font-size: 100px;
	}
</style>
<body>
	<h1>Server Name:</h1>
	<h1><?= $randomServerName; ?></h1>
</body>
</html>


