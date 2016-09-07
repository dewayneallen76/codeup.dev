<?php 
// arrays for adjectives and nouns
$adjective = ['Amazing', 'Bumpy', 'Courageous', 'Droopy', 'Edible', 'Fabulous', 'Gargantuan', 'Hairy', 'Interesting', 'Jumpy'];
$noun = ['Tree', 'Airplane', 'House', 'Dog', 'Lizard', 'Camel', 'Rocket', 'Snake', 'Mouse', 'Baby'];
// Function to create random name from $adjective array and from $noun array
function randomServerName($array) 
{ 	
$random = mt_rand(0,9);
return $array[$random];
}

?>
<!-- HTML for output -->
<!DOCTYPE html>
<html>
<head>
	<title>Server Name Generator</title>
</head>
<style>
	h1 {
		text-align: center;
		background-color: silver;
		color: green;
		font-family: "Lucida Console", Monaco, monospace;
	}
</style>
<body>
	<h1>Server Name:</h1>
	<h1><?php echo randomServerName($adjective) . " " . randomServerName($noun); ?></h1>
</body>
</html>


