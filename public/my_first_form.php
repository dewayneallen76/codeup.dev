	<?php
  var_dump($_GET);
  var_dump($_POST);
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>My First HTML Form</title>
</head>
	<body>
		<hr>
		<form method="POST" action="/my_first_form.php">
		    <p>
		        <label for="username">Username</label>
		        <input id="username" name="username" type="text" placeholder="Enter Your Username">
		    </p>
		    <p>
		        <label for="password">Password</label>
		        <input id="password" name="password" type="password" placeholder="Enter Your Password">
		    </p>
		    <p>
		        <button>Submit</button>
		    </p>
		</form>
		<hr> <!-- <hr> adds a line  -->
			<p>
				<img src="/img/duckduck.jpeg">
			</p>
			<p>
		<form method="GET" action="http://duckduckgo.com">
				<label>Search Duck Duck Go</label>
				<input id="q" name="q" type="text" placeholder="Search Duck Duck GO">
			</p>
			<p>
				<input type="submit" value="GO!">
			</p>
		</form>
		<hr>
		<form>
			<p>
			<label>TO:</label>
				<input type="to" name="To:" placeholder="enter recipient">
			</p>
			<p>
			<label>FROM:</label>
				<input type="from" name="From:" placeholder="enter your name">
			</p>
			<p>
			<label>SUBJECT:</label>
				<input type="subject" name="Subject:" placeholder="enter subject">
			</p>
			<p>	
				<textarea id="email_body" name="email_body" rows="10" cols="50">Type message here</textarea>

			</p>
			<p>
				<input type="submit" value="Send Message">
				<input type="checkbox" id="save copy" name="save_copy" value="yes" checked>
				<label for="save_copy">Save copy to sent file?</label>
			</p>
		</form>
		<hr>
		<a href="http://reddit.com/search?q=javascript&sort=top" target="_blank">Search Reddit for 'javascript' and sort results by 'top'</a>
		<hr>
		<h2>Search Reddit, top results listed first</h2>
		<p>
			<!-- a GET request is a download request, you want to get something from the action -->
			<!-- a POST request is an upload request, you want to send something to the action -->
			<!-- if you don't specifiy an action is will try to get the requests from the page you are on -->
		<form method="GET" target="_blank" action="http://reddit.com/search">
			<input id="q" name="q" type="text" placeholder="Search Reddit fo shit!">
			<input name="sort" value="top" type="hidden">
		</p>
		<p>
			<input type="submit" value="SEARCH!">
		</p>
		</form>
		<hr>
		<form>
		<h2>Multiple Choice Test</h2>
		<p>1. What is the capital of Texas?</p>
			<label><input type="radio" name="q1" value="houston">Houston</label>
			<label><input type="radio" name="q1" value="austin">Austin</label>
			<label><input type="radio" name="q1" value="dallas">Dallas</label>
			<label><input type="radio" name="q1" value="san antonio">San Antonio</label>
		<p>2. What is Tim Duncans number?</p>
			<label><input type="radio" name="q2" value="21">21</label>
			<label><input type="radio" name="q2" value="5">5</label>
			<label><input type="radio" name="q2" value="31">31</label>
			<label><input type="radio" name="q2" value="50">50</label>
		<p>
			<input type="submit">
		</p>
		</form>
		<hr>
		<form>
		<p>What have we learned so far</p>
			<label><input type="checkbox" id="cu1" name="cu[]" value="shortcuts"> Shortcuts </label>
			<label><input type="checkbox" id="cu2" name="cu[]" value="virtualmachines"> Virtual Machines </label>
			<label><input type="checkbox" id="cu3" name="cu[]" value="HTML"> HTML </label>
			<label><input type="checkbox" id="cu4" name="cu[]" value="tables"> Tables </label>
			<label><input type="checkbox" id="cu5" name="cu[]" value="cake"> Baking a cake </label>
		<p>
			<input type="submit">
		</p>
		<p>
			<label for="os">What operating systems have you used? </label>
			<select id="os" name="os[]" multiple>
				<option value="linux">Linux</option>
				<option value="osx">OSX</option>
				<option value="windows">Windows</option>
				<option value="android">Android</option>
			</select>
		<p>
			<input type="submit" name="os []">
		</p>
		</form>
		<hr>
		<form>
		<h2>Select Testing</h2>
			<label for="car">Do you own a car?</label>
			<select id="car" name="car">
				<option selected value="1">Yes</option>
				<option value="2">No</option>
			</select>
		<p>
			<input type="submit">
		</p>
		</form>
		<hr>

	</body>
</html>

				
