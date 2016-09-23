<?php 
define ('DB_HOST', 'mysql:host=127.0.0.1');
define ('DB_NAME', 'dbname=parks_db');
define ('DB_USER', 'parks_user');
define ('DB_PASS', 'parksrocks');
require_once('../db_connect.php');

function getParks($dbc){
	$stm = $dbc->query("SELECT * FROM national_parks;");
	$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function getLocation($dbc){
	$stm = $dbc->query("SELECT location FROM national_parks;");
	$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}
$parks = getParks($dbc);

// foreach($parks as $park){
// 	echo $park['name']. " --- ".$park['location']. " --- ".$park['date_established']. " --- ".$park['area_in_acres'];
// 	echo "<br>";
// }

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
      		<th>Name</th>
      		<th>Location</th>
      		<th>Date Established</th>
      		<th>Area in Acres</th>
    		</tr>
  		</thead>
  		<tbody>
    		<tr>
    		<?php foreach ($parks as $park): ?>
      		<td><?= $park['name']; ?></td>
      		<td><?= $park['location']; ?></td>
      		<td><?= $park['date_established']; ?></td>
      		<td><?= $park['area_in_acres']; ?></td>
      		<?php endforeach; ?>
    		</tr>
  		</tbody>
		</table>
		<ul class="pagination">
  			<li class="disabled"><a href="#">&laquo;</a></li>
  			<li class="active"><a href="#">1</a></li>
  			<li><a href="#">2</a></li>
  			<li><a href="#">3</a></li>
  			<li><a href="#">4</a></li>
  			<li><a href="#">5</a></li>
  			<li><a href="#">&raquo;</a></li>
		</ul> 
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</html>

