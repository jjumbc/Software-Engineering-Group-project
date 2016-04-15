<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Home</title>
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
<h2>Open Jobs</h2>
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';
	
	$qry="SELECT JobID,CustomerID,WorkerID,Description,Price,Date,Time,ZipCode FROM Jobs WHERE (CustomerID='$userID' OR WorkerID='$userID') AND Completed='0'";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>User Type</th><th style="width: 50%;">Job Description</th><th>Price</th><th>Date to Complete By</th><th>Time of Day</th>';
		echo '<th>Zip Code</th><th>Mark as Complete</th></tr>';
		while($row = mysqli_fetch_row($result)) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					if ($key == 0) {
						$jobID = $value;
					}
					elseif ($key == 1 && $value == $userID) {
						echo '<td>Customer</td>';
						
					}
					elseif ($key == 2 && $value == $userID) {
						echo '<td>Worker</td>';
					}
					elseif ($key > 2) {
						if ($key == 4) {
							echo '<td>$',$value,'</td>';
						}
						else {
							echo '<td>',$value,'</td>';
						}
					}
				}
				echo '<td><form action="" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '">
				<input type="submit" name="mark" style="width: 100%;" value="Completed"></form></td>';
				echo '</tr>';
		}
		echo '</table>';
	}
	else {
		echo 'None';
	}
	
	echo "</div><div id='bglayer'>";
	echo "<h2>Completed Jobs</h2>";
	$qry="SELECT JobID,CustomerID,WorkerID,Description,Price,Date,ZipCode FROM Jobs WHERE (CustomerID='$userID' OR WorkerID='$userID') AND Completed='1'";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>User Type</th><th style="width: 50%;">Job Description</th><th>Price</th><th>Date Accepted</th><th>Zip Code</th>';
		echo '<th>Review</th></tr>';
		while($row = mysqli_fetch_row($result)) {
		
				echo '<tr>';
				foreach($row as $key=>$value) {
					if ($key == 0) {
						$jobID = $value;
					}
					elseif ($key == 1 && $value == $userID) {
						$type = "customer";
						echo '<td>Customer</td>';
						
					}
					elseif ($key == 2 && $value == $userID) {
						$type = "worker";
						echo '<td>Worker</td>';
					}
					elseif ($key > 2) {
						if ($key == 4) {
							echo '<td>$',$value,'</td>';
						}
						else {
							echo '<td>',$value,'</td>';
						}
					}
				}
				
				$qry = "SELECT CustomerRating, WorkerRating FROM Reviews WHERE JobID='$jobID'";
				$result2 = mysqli_query($link, $qry);
				if ($result2 && mysqli_num_rows($result2) > 0) {
						echo '<td><form action="viewreview.php" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '"><input type="hidden" name="type" value="' . $type . '">
						<input type="submit" name="submit" style="width: 100%;" value="View Review"></form></td>';
						echo '</tr>';
					}
				else {
						echo '<td><form action="review_form.php" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '"><input type="hidden" name="type" value="' . $type . '">
						<input type="submit" name="submit" style="width: 100%;" value="Submit Review"></form></td>';
						echo '</tr>';
					}
				
		}
		echo '</table>';
	}
	else {
		echo 'None';
	}
	
	if (isset($_POST["mark"])) {
		$jobID = $_POST["jobID"];
		$qry = "UPDATE Jobs SET Completed='1' WHERE JobID='$jobID'";
		$result = mysqli_query($link, $qry);
	}
?>
<br>
<br>
<br>
</div>
</body>
</html>