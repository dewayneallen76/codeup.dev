<?php
    var_dump($_GET);
    var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Pizza Order Form</title>
</head>
	<body>
	<hr>
	<h2>Online Pizza Order Form</h2>
	<form method="POST" action="/pizza_form.php">
	<p>
		<label for="quantity">How many pizzas? </label>
		<select id="quantity" name="quantity">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		</select>
	</p>
	<hr>
	<p>What type of crust would you like?</p>
	<label>
		<input type="radio" name="crust" value="thin">Thin Crust</label>
		<input type="radio" name="crust" value="pan">Pan Crust</label>
		<input type="radio" name="crust" value="hand">Hand Tossed</label>
		<input type="radio" name="crust" value="stuffed">Stuffed Crust
	</label>
	<hr>
	<p>
		<label for="size">Size? </label>
		<select id="size" name="size">
			<option>Small</option>
			<option>Medium</option>
			<option>Large</option>
			<option>Extra Large</option>
			<option>Giant</option>
		</select>
	</p>
	<hr>
	<p>Select Toppings</p>
	<label>
		<input type="checkbox" name="toppings []" value="cheese">Cheese</label>
		<img src="/img/pie-cheese.jpeg">
		<br>
		<input type="checkbox" name="toppings []" value="pepperoni">Pepperoni</label>
		<img src="/img/pepp.jpeg">
		<br>
		<input type="checkbox" name="toppings []" value="bacon">Bacon</label>
		<img src="/img/bacon.jpeg">
		<br>
		<input type="checkbox" name="toppings []" value="canadian bacon">Canadian Bacon</label>
		<img src="/img/canbac.jpeg">
		<br>
		<input type="checkbox" name="toppings []" value="peppers">Peppers</label>
		<img src="/img/pepper.jpg">
		<br>
		<input type="checkbox" name="toppings []" value="black olives">Black Olives</label>
		<img src="/img/bolives.jpg">
		<br>
		<input type="checkbox" name="toppings []" value="onions">Onions</label>
		<img src="/img/onions.jpg">
		<br>
		<input type="checkbox" name="toppings []" value="everything">Everything!
		<img src="/img/everything.jpg">
	</label>
	<hr>
	<h2>Delivery Information</h2>
	<form method="POST" action="/pizza_form.php">
	<p>
		<label for="firstname">First Name:</label>
		<input id="firstname" name="firstname" type="text">
	</p>
	<p>
		<label for="lastname">Last Name:</label>
		<input id="lastname" name="lastname" type="text">
	</p>
	<p>
		<label for="email">Email:</label>
		<input id="email" name="email" type="text">
	<p>
		<input type="checkbox" name="mailing_list" value="yes" checked>
		<label for="mailing_list">Sign me up to receive special offers via email!</label>
	</p>
	</p>
	<p>
		<label for="phone" name="phone">Phone Number:</label>
		<input id="phone" name="phone" type="text">
	</p>
	<p>
		<label for="ccinfo" name="ccinfo">Credit Card:</label>
		<input id="ccinfo" name="ccinfo" type="password">
	</p>
	<p>
		<textarea id="address" name="address" rows="5" cols="40">Delivery Address:</textarea> 
	</p>
	<p>
		<textarea id="instruct" name="instruct" rows="5" cols="40">Delivery Instructions:</textarea>
	</p>
	<p>
		<input type="submit" value="Submit">
	</p>
 	</body>
</html>