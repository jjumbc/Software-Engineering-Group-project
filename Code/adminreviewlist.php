<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Admin Review List</title>
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
<br>

<div id="jobview">
<h2>All Reviews for Selected User</h2>
<?php
	$userID = $_GET["ID"];
	$type = $_GET["type"];
	require 'link.php';

	if ($type == "worker") {
		$qry="SELECT CustomerReview, CustomerRating FROM Reviews JOIN Jobs ON Reviews.JobID=Jobs.JobID WHERE WorkerID='$userID'";
	}
	else {
		$qry="SELECT WorkerReview, WorkerRating FROM Reviews JOIN Jobs ON Reviews.JobID=Jobs.JobID WHERE CustomerID='$userID'";
	}
	
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Review</th><th>Review Score</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo '<td>', $value, '</td>';
			}
			echo '</tr>';
		}
		echo '</table>';
	}
	else {
		echo 'No reviews found<br>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
<a href="admin.php">Back to Admin Panel</a>
</div>
</body>
</html>