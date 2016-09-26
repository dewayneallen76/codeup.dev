<?php 
require_once('../national_parks_config.php');
require_once('../db_connect.php');
// PAGE CONTROLLER TO CALL PARKS FROM DATABASE AND COUNT OF TOTAL ROWS. 
function pageController($dbc) {
	$offset = (isset($_GET['offset'])) ? ($_GET['offset']) : 0;
	$query = ("SELECT * FROM national_parks");
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	$query2 = ("SELECT * FROM national_parks LIMIT 4 OFFSET ".$offset);
	$stmt2 = $dbc->prepare($query2);
	$stmt2->execute();
	$parks = $stmt2 ->fetchAll(PDO::FETCH_ASSOC);
	return [ 
		'parks' => $parks,
		'totalParks' => $stmt->rowCount()
	];
};
extract (pageController($dbc));
// FUNCTION THAT I WROTE BEFORE ADDING PAGE CONTROLLER 
// function getParks($dbc){
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
      		<th>Description</th>
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
      			<td><?= number_format($park['area_in_acres']); ?></td>
      			<td><?= $park['description']; ?></td>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

