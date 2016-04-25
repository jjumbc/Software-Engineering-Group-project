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
if (!isset($_COOKIE["UserID"])) {
	echo '<script type="text/javascript">window.location = "index.php"</script>';
}
?>
<div id="bglayer">
	<div style="overflow: auto;">
		<a href="home.php"><img class="logo" src="site_logo_small.png" width="250"></a>
		<?php
			if ($_COOKIE["UserType"] == 1) {
				echo '<a href="home.php"><div id="linkcomp">Profile Home</div></a>
				<a href="joblist.php"><div id="linkcomp">Search Jobs</div></a>
				<a href="create_job.php"><div id="linkcomp">Create New Job</div></a>
				<a href="admin.php"><div id="linkcompadmin">Admin Panel</div></a>
				<br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			else {
				echo '<a href="home.php"><div id="link">Profile Home</div></a>
				<a href="joblist.php"><div id="link">Search Jobs</div></a>
				<a href="create_job.php"><div id="link">Create New Job</div></a>
				<br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}

			if (isset($_COOKIE["UserName"])) {
				echo "Hello, ";
				echo $_COOKIE["UserName"];
				echo "! ";
			}
		?>
		<a href="logout.php">Log Out</a>
	</div>
</div>
<br>
		<div id="login">
		<form action="createjob.php" method="post">
			<textarea id="box" style="height: 200px" name="description" maxlength="512" placeholder="Full Job Description" required></textarea><br><br>
			<input type="number" id="box" style="width: 40%" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" name="price" placeholder="Job Price" required><br><br>
			<input type="text" id="box" style="width: 65%"name="address" placeholder="Job Address" required><br>
			<input type="text" id="box" style="width: 40%" name="zip" placeholder="Zip Code" required><br><br>
			
			Job Date<br><input type="date" id="box" style="width: 60%" name="date" required><br>
			Job Time<br><input type="time" id="box" style="width: 60%" name="time" required><br><br>
			<input type="submit" value="Submit" id="submit">&nbsp;&nbsp;&nbsp;<a href="home.php">Cancel</a>
		</form>
		</div>
	<br>
	<br>
	<br>
	</body>
</html>