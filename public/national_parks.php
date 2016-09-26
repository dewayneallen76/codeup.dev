<?php 
require_once('../national_parks_config.php');
require_once('../db_connect.php');
// PAGE CONTROLLER TO CALL PARKS FROM DATABASE AND COUNT OF TOTAL ROWS. 
function pageController($dbc) 
{
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

function submitNewPark($dbc) 
{
	$query = 'INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (?, ?, ?, ?, ?)';
	
	$stmt = $dbc->prepare($query);

	$stmt->execute(array($_GET['name'], $_GET['location'], $_GET['date_established'], $_GET['area_in_acres'], $_GET['description']));
}

if(isset($_GET['name'])) {
	submitNewPark($dbc);
};
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
	<br>
	<br>
	<form class="form-horizontal" method="get">
  		<div class="form-group">
    		<label for="park_name" class="col-sm-2 control-label">Park Name</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name="name" placeholder="Park Name" required>
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="park_location" class="col-sm-2 control-label">Location</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name="location" placeholder="Park Location" required>
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="date_established" class="col-sm-2 control-label">Date Established (YYYY-MM-DD)</label>
    		<div class="col-sm-10">
      			<input type="date" class="form-control" name="date_established" placeholder="Date Established YYYY-MM-DD" required>
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="area_in_acres" class="col-sm-2 control-label">Area In Acres</label>
    		<div class="col-sm-10">
      			<input type="number" class="form-control" name="area_in_acres" placeholder="Area In Acres" required>
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="description" class="col-sm-2 control-label">Description</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name="description" placeholder="Description" required>
    		</div>
  		</div>
  		<input class="btn btn-default btn-primary" type="submit" value="Submit">
  	</form>
  <br>
  		
  	</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

