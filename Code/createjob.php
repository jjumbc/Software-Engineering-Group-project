<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Create Job</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
	<body>
<?php
	require 'header.php';
?>
	<div id="login">
		<form action="addjob.php" method="post">
			<textarea id="box" style="height: 200px" name="description" maxlength="512" placeholder="Full Job Description" required></textarea><br><br>
			<input type="number" id="box" style="width: 40%" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" name="price" placeholder="Job Price" required><br><br>
			<input type="text" id="box" style="width: 65%"name="address" placeholder="Job Address" required><br>
			<input type="text" id="box" style="width: 40%" name="zip" placeholder="Zip Code" required><br><br>
			Complete By:<br><br>
			Date<br><input type="date" id="box" style="width: 60%" name="date" required><br>
			Time<br><input type="time" id="box" style="width: 60%" name="time" required><br><br>
			<input type="submit" value="Submit" id="submit">&nbsp;&nbsp;&nbsp;<a href="home.php">Cancel</a>
		</form>
		</div>
	<br>
	<br>
	<br>
	</body>
</html>