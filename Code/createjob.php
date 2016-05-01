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
			<textarea id="box" style="height: 200px" name="description" maxlength="512" placeholder="Full Job Description" required></textarea><br>
			<input type="number" id="box" style="width: 30%" min="0" max="9999" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" name="price" placeholder="Job Price" required><br><br>
			<input type="text" id="box" style="width: 70%"name="address" placeholder="Job Address" pattern="[1-9][0-9]{0,4} [A-Za-z- \.]+" required title="House number must precede street name"><br>
			<input type="text" id="box" style="width: 40%" name="zip" placeholder="Zip Code" pattern="[0-9]{5}"required title="Must be 5 digits"><br><br>
			<u>Complete By:</u><br><br>
			Date<br><input type="date" id="box" style="width: 30%" name="date" min="" max="" required><br>
			Time<br><input type="time" id="box" style="width: 30%" name="time" min="06:00:00" max="23:59:59" required><br><br>
			<input type="submit" value="Submit" id="submit" style="width: 15%">&nbsp;&nbsp;&nbsp;<a href="home.php">Cancel</a>
		</form>
		</div>
	<script>
		var currentDate = new Date();
		var day = currentDate.getDate();
		if (day < 10) {
			day = "0" + day;
		}
		var month = currentDate.getMonth() + 1;
		if (month < 10) {
			month = "0" + month;
		}
		var year = currentDate.getFullYear();
		var min = (year + "-" + month + "-" + day);
		var max = ((year + 1) + "-" + month + "-" + day);
		document.getElementsByName("date")[0].min = min;
		document.getElementsByName("date")[0].max = max;
	</script>
	<br>
	<br>
	<br>
	</body>
</html>