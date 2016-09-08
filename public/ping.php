<?php 

function pageController () {
	$count = [];
	$count['count'] = (isset($_GET['count'])) ? $_GET['count'] : 0;

	return $count;
}

extract(pageController());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PING</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
    	<h1>PING</h1>
    	<h1>Counter: <?= $count; ?></h1>
    	<a class="btn btn-primary btn-lg" href="/pong.php?count=<?= $count +1;?>&hit" role="button">HIT</a>
    	<a class="btn btn-primary btn-lg" href="/ping.php?miss" role="button">MISS</a>
    </div>
</body>  