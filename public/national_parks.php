<?php 
define ('DB_HOST', 'mysql:host=127.0.0.1');
define ('DB_NAME', 'dbname=parks_db');
define ('DB_USER', 'parks_user');
define ('DB_PASS', 'parksrocks');
require_once('../db_connect.php');
// PAGE CONTROLLER TO CALL PARKS FROM DATABASE AND COUNT OF TOTAL ROWS. 
function pageController($dbc) {
	$offset = (!empty($_GET)) ? ($_GET['offset']) : 0;
	$stm = $dbc->query("SELECT * FROM national_parks");
	return [ 
		'parks' => $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET ".$offset)->fetchAll(PDO::FETCH_ASSOC),
		'totalParks' => $stm->rowCount()
	];
};
extract (pageController($dbc));
// FUNCTION THAT I WROTE BEFORE ADDING PAGE CONTROLLER 

// function getParks($dbc){
// 	$offset = (!empty($_GET)) ? ($_GET['offset']) : 0;
// 	$stm = $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET ".$offset);
// 	$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
// 	$parkCount = $stm->rowCount();
// 	return $rows;
// };
// $parks = getParks($dbc);

?>
<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css">
<body>
	<div class="container-fluid">
		<table class="table table-striped table-hover ">
  		<h1>National Parks</h1>
  		<thead>
    		<tr>
    		<th>ID</th>
      		<th>Name</th>
      		<th>Location</th>
      		<th>Date Established</th>
      		<th>Area in Acres</th>
    		</tr>
  		</thead>
  		<tbody> 
  		<!-- PHP FOR EACH LOOP TO ADD EACH PARK AND ITS INFORMATION INTO TABLE -->
    		<?php foreach ($parks as $park): ?>
    		<tr>
    		<td><?= $park['id']; ?></td>
      		<td><?= $park['name']; ?></td>
      		<td><?= $park['location']; ?></td>
      		<td><?= $park['date_established']; ?></td>
      		<td><?= $park['area_in_acres']; ?></td>
    		</tr>
    		<?php endforeach; ?>
  		</tbody>
		</table>
		<br>
		<!-- PHP FOR LOOP TO LOOP THROUGH TOTAL PARKS, AND CREATE BUTTON USING QUERY STRING -->
		<?php for($i = 0; $i <= $totalParks; $i+=4) : ?>
			<a href="national_parks.php?offset=<?=$i?>"><div class="btn btn-primary btn-sm"><?=($i+1)?> - <?=($i+4)?></div></a>
			<?php endfor; ?>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</html>

