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
    		<?php foreach ($parks as $park): ?>
    		<tr>
      		<td><?= $park['name']; ?></td>
      		<td><?= $park['location']; ?></td>
      		<td><?= $park['date_established']; ?></td>
      		<td><?= $park['area_in_acres']; ?></td>
    		</tr>
    		<?php endforeach; ?>
  		</tbody>
		</table>
		<ul class="pagination">
  			<li class="disabled"><a href="#">&laquo;</a></li>
  			<li class="active"><a href="#">1-4</a></li>
  			<li><a href="#">5-8</a></li>
  			<li><a href="#">9-12</a></li>
  			<li><a href="#">12-15</a></li>
  			<li><a href="#">16-20</a></li>
  			<li><a href="#">21-24</a></li>
  			<li><a href="#">25-28</a></li>
  			<li><a href="#">29-32</a></li>
  			<li><a href="#">33-36</a></li>
  			<li><a href="#">37-40</a></li>
  			<li><a href="#">41-44</a></li>
  			<li><a href="#">45-48</a></li>
  			<li><a href="#">49-52</a></li>
  			<li><a href="#">53-56</a></li>
  			<li><a href="#">57-59</a></li>
  			<li><a href="#">&raquo;</a></li>
		</ul> 
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</html>

