<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Submit Review</title>
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
		<a href="home.php"><div id="link">Profile Home</div></a>
		<a href="joblist.php"><div id="link">Search Jobs</div></a>
		<a href="create_job.php"><div id="link">Create New Job</div></a><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php
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
<br>

		<div id="head">
		<img src="site_logo.png" alt="Logo" width="500"></div>
		<div id="login">
		<form action="review_form.php" method="post">
			Star Rating<br><input type="number" min="1" max="5" step="1" id="box" style="width: 50%;" name="starRating" required><br><br>
			Feedback<br><textarea id="box" style="height: 200px" name="description" maxlength="512" required></textarea><br><br>
			<input type="submit" value="Submit Review" id="submit">
		</form>
		</div>
	</body>
</html>
