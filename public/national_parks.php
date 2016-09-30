<?php 
require_once ('../national_parks_config.php');
require_once ('../db_connect.php');
require_once ('../input.php');

// FUNCTION CREATED USING PREPARED STATEMENTS USING POST TO ADD NEW PARK TO DATABASE.
function submitNewPark($dbc) 
{
	try {
		$name = Input::getString('name');	
		} catch (Exception $e) {
			$errors['name'] = $e->getMessage();
		}
	try {
		$location = Input::getString('location');
		} catch (Exception $e) {
			$errors['location'] = $e->getMessage();
		}
	try {
		$date_established = Input::getString('date_established');
		} catch (Exception $e) {
			$errors['date_established'] = $e->getMessage();
		}
	try {
		$area_in_acres = Input::getNumber('area_in_acres');
		} catch (Exception $e) {
			$errors['area_in_acres'] = $e->getMessage();
		}
	try {
		$description = Input::getString('description');
		} catch (Exception $e) {
			$errors['description'] = $e->getMessage();
		}

	if(count(Input::$errors) == 0) {
	$query = 'INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)';
	
	$stmt = $dbc->prepare($query);
// Update your national_parks.php page to use your updated Input class and the appropriate method for the //different form fields.
	
	$stmt->bindValue(':name', htmlspecialchars(strip_tags(Input::getString('name'))), PDO::PARAM_STR);
	$stmt->bindValue(':location', htmlspecialchars(strip_tags(Input::getString('location'))), PDO::PARAM_STR);
	$stmt->bindValue(':date_established', htmlspecialchars(strip_tags(Input::getString('date_established'))), PDO::PARAM_INT);
	$stmt->bindValue(':area_in_acres', htmlspecialchars(strip_tags(Input::getNumber('area_in_acres'))), PDO::PARAM_INT);	
	$stmt->bindValue(':description', htmlspecialchars(strip_tags(Input::getString('description'))), PDO::PARAM_STR);

	$stmt->execute();

	}
}



// PAGE CONTROLLER  
function pageController($dbc) 
{
	if(Input::get('name')) {
	submitNewPark($dbc);
	};
	$limit = 4;
	$offset = (isset($_GET['page'])) ? (($_GET['page'] -1) * $limit) : 0;
	$query = ('SELECT * FROM national_parks');
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	$query2 = ('SELECT * FROM national_parks LIMIT :limit OFFSET :offset');
	$stmt2 = $dbc->prepare($query2);
	$stmt2->bindValue(':offset', $offset, PDO::PARAM_INT);
	$stmt2->bindValue(':limit', $limit, PDO::PARAM_INT);
	$stmt2->execute();
	$parks = $stmt2 ->fetchAll(PDO::FETCH_ASSOC);
	return [ 
		'parks' => $parks,
		'totalParks' => $stmt->rowCount(),
		'limit' => $limit
	];
};
extract (pageController($dbc));

?>
<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css">
<style>
.buttons {
	margin-left: 15px;
}
</style>
<body>
	<div class="container-fluid">
		<h1 class="text-center">National Parks</h1>
		<table class="table table-striped table-hover table-bordered">
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
		<!-- BUTTONS -->
		<!-- PHP TO ADD BACK BUTTON -->
		<div class="container-fluid content-center buttons">
		<?php if (!empty($_GET)){ 
			if ($_GET['page'] != 1){ ?>
				<a href="national_parks.php?page=<?=($_GET['page']-1)?>">
				<div class="btn btn-lg btn-primary"><</div>
				</a>
				<?php }
		} ?>
		<!-- PHP FOR LOOP TO LOOP THROUGH TOTAL PARKS, AND CREATE BUTTON USING QUERY STRING -->
		<?php $page = 1;
			for ($i = 1; $i <= $totalParks; $i+=$limit) { ?>
				<a href="national_parks.php?page=<?=$page?>"> 
					<div class="btn btn-lg btn-primary">
						<?=$page++?>	
					</div>
				</a>
		<?php }
		// PHP TO ADD NEXT BUTTON
			if (!empty($_GET)){ 
				if (($_GET['page']+1) < $page) { ?>
					<a href="national_parks.php?page=<?=($_GET['page']+1)?>">
						<div class="btn btn-lg btn-primary">></div>
					</a>
				<?php }
				} else {?>
					<a href="national_parks.php?page=2">
						<div class="btn btn-lg btn-primary">></div>
					</a>
				<?php } ?>
		</div>	
		<br>
		<h1 class="text-center">Add A New Park</h1>
		<br>
	<!-- FORM TO ADD A NEW PARK TO THE DATABASE -->
		<?php foreach (Input::$errors as $error) { ?>
				<h2 style="color: red;"><?= $error ?></h2>
			<?php }?>
		<form class="form-horizontal" method="post">
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
				<label for="date_established" class="col-sm-2 control-label">Date Established</label>
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
					<textarea type="text" class="form-control" name="description" placeholder="Description" required></textarea>
				</div>
			</div>
			<input class="btn btn-default btn-lg btn-block btn-primary" type="submit" value="Submit">
		</form>	
		<br>
	</div>
</body>
<script   src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>

