<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Job List</title>
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

<div id="jobview">
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';

	$qry="SELECT JobID, Description, Price, Date, ZipCode FROM Jobs WHERE WorkerID IS NULL AND NOT (CustomerID = '$userID');";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Job</th><th>Price</th><th>Date to Complete By</th><th>Location</th>';
		echo '<th>Work On Job</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				if ($key != 0) {
					if ($key == 2) {
						echo '<td>$', $value, '</td>';
					}
					else {
						echo '<td>', $value, '</td>';
					}
				}
			}
			echo '<td><form action="acceptjob.php" method="POST"><input type="hidden" name="jobID" value="' . $row[0] . '">
				<input type="submit" name="submit" style="width: 100%;" value="Accept Job"></form></td>';
			#echo '<td><a href="acceptjob.php?jobid=', $row[0], '">Click here to work on this job</a></td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	else {
		echo 'No jobs found in your area! :(<br>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>