<?php 
	
	$count = (isset($_GET['count'])) ? $_GET['count'] : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Counter</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    	<h1>Counter: <?= $count; ?></h1>
    	<a class="btn btn-default" href="/counter.php?count=<?= $count +1;?>" role="button">Up +</a>
    	<a class="btn btn-default" href="/counter.php?count=<?= $count -1;?>" role="button">Down -</a>
    </div>
</body>    
