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

		<div id="bglayer">
		<form action="review.php" method="post">
			Star Rating<br>
			<select id="box" name="starRating" style="width: 30%;">
			  <option value="1">&#9733; (Very Poor)</option>
			  <option value="2">&#9733;&#9733; (Poor)</option>
			  <option value="3" selected>&#9733;&#9733;&#9733; (Ok)</option>
			  <option value="4">&#9733;&#9733;&#9733;&#9733; (Good)</option>
			  <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733; (Very Good)</option>
			</select><br><br>
			Feedback<br><textarea id="box" style="height: 200px" name="feedback" maxlength="512" required></textarea><br><br>
			<?php
				$jobID = $_POST["jobID"];
				$type = $_POST["type"];
				echo '<input type="hidden" name="jobID" value="' . $jobID . '">';
				echo '<input type="hidden" name="type" value="' . $type . '">';
			?>
			<input type="submit" value="Submit Review" id="submit">
		</form>
		</div>
	</body>
</html>
