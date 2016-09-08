<?php 
// refactored using pageController 
	function pageController() 
	{
	$favoriteThings = [];
	$favoriteThings['things']= ['God', 'Guns', 'Family', 'Murica', 'Apple Pie'];
	return $favoriteThings;
	}
	
	$favoriteThings = pageController();
	extract($favoriteThings);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Favorite Things</title>
</head>
<style>
	h1, th {
		color: red;
		text-align: center;
		font-family: "Lucida Console", Monaco, monospace;
	}
	tr:nth-child(even) {
		background-color: blue;
	}		
</style>
<body>
	<table style = "width:100%">
	<h1>My Favorite Things</h1>
    <?php foreach ($things as $thing) : ?>
      <tr>
        <th><?php echo $thing; ?></th>
    	<?php endforeach; ?>
      </tr>
    </table>
</body>
</html>