<?php 

$favoriteThings = ['God', 'Guns', 'Family', 'Murica', 'Apple Pie'];


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>My Favorite Things</title>
</head>
<style>
	h1, ul {
		text-align: center;
		color: green;
		font-family: "Lucida Console", Monaco, monospace;
	}
</style>
<body>
	<table style = "width:100%">
	<h1>My Favorite Things</h1>
    <?php foreach ($favoriteThings as $things) : ?>
        <th><?php echo $things; ?></th>
    <?php endforeach; ?>
    </table>
</body>
</html>