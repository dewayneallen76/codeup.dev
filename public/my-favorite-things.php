<?php 

$favoriteThings = ['God', 'Guns', 'Family', 'Murica', 'Apple Pie'];


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>My Favorite Things</title>
</head>
<style>
	h1, th {
		text-align: center;
		color: green;
		font-family: "Lucida Console", Monaco, monospace;
	}
	th: nth-child(even) {
		background-color: gray;
	}
</style>
<body>
	<table style = "width:100%">
	<h1>My Favorite Things</h1>
    <?php foreach ($favoriteThings as $things) : ?>
      <tr>
        <th><?php echo $things; ?></th>
    	<?php endforeach; ?>
      </tr>
    </table>
</body>
</html>