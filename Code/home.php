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

<div id="bglayer">
<h2>Open Jobs</h2>
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';
	
	$qry="SELECT JobID,CustomerID,WorkerID,CustomerCompleted,WorkerCompleted,Description,Price,Date,Time,ZipCode FROM Jobs WHERE (CustomerID='$userID' OR WorkerID='$userID') AND (CustomerCompleted='0' OR WorkerCompleted='0')";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<div class="nice-table"><table>';
		echo '<tr><th style="width: 10%;">User Type</th><th style="width: 10%;">Working With</th><th style="width: 40%;">Job Description</th><th>Price</th><th>Date to Complete By</th><th>Time of Day</th>';
		echo '<th>Zip Code</th><th>Mark as Complete</th></tr>';
		while($row = mysqli_fetch_row($result)) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					if ($key == 0) {
						$jobID = $value;
					}
					elseif ($key == 1) {
						$custID = $value;
						if ($value == $userID) {
							$type = "customer";
							echo '<td>Customer</td>';
						}
					}
					elseif ($key == 2) {
						$workID = $value;
						if ($custID == $userID) {
							$qry = "SELECT UserName FROM Users WHERE UserID='$workID' AND Banned='0'";
							$result2 = mysqli_query($link, $qry);
							if ($result2 && mysqli_num_rows($result2) > 0) {
								$row = mysqli_fetch_assoc($result2);
								$str = $row["UserName"];
							}
							else {
								$str = 'N/A';
							}
							echo "<td>$str</td>";
						}
						
						if ($value == $userID) {
							$qry = "SELECT UserName FROM Users WHERE UserID='$custID' AND Banned='0'";
							$result2 = mysqli_query($link, $qry);
							if($result2 && mysqli_num_rows($result2) > 0) {
								$row = mysqli_fetch_assoc($result2);
								$str = $row["UserName"];
							}
							else {
								$str = 'N/A';
							}
							$type = "worker";
							echo '<td>Worker</td>';
							echo "<td>$str</td>";
						}
					}
					elseif ($key == 3) {
						$custCompleted = $value;
					}
					elseif ($key == 4) {
						$workCompleted = $value;
					}
					elseif ($key > 4) {
						if ($key == 6) {
							echo '<td>$',$value,'</td>';
						}
						else {
							echo '<td>',$value,'</td>';
						}
					}
				}
				
				if (isset($workID)) {
					echo '<td><form action="" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '"><input type="hidden" name="type" value="' . $type . '">';
					if (($custCompleted == 1 && !$workCompleted && $type == "customer") || ($workCompleted == 1 && !$custCompleted && $type == "worker")) {
						echo '<input type="submit" name="mark" style="width: 100%;" value="Pending"></form></td>';
					}
					else {
						echo '<input type="submit" name="mark" style="width: 100%;" value="Mark Complete"></form></td>';
					}
				}
				else {
					echo '<td><form onsubmit="return false;"><input type="submit" style="background-color: #A9A9A9; width: 100%" value="Mark Complete"></form></td>';
				}
				echo '</tr>';
		}
		echo '</table></div><br>';
	}
	else {
		echo 'None<br><br>';
	}
	
	echo "</div><div id='bglayer'>";
	echo "<h2>Completed Jobs</h2>";
	$qry="SELECT JobID,CustomerID,WorkerID,Description,Price,Date FROM Jobs WHERE (CustomerID='$userID' OR WorkerID='$userID') AND CustomerCompleted='1' AND WorkerCompleted='1'";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		
		echo '<div class="nice-table"><table>';
		echo '<tr><th style="width: 10%;">User Type</th><th style="width: 10%;">Working With</th><th style="width: 40%;">Job Description</th><th>Price</th><th>Date Accepted</th>';
		echo '<th>Review</th></tr>';
		while($row = mysqli_fetch_row($result)) {
		
				echo '<tr>';
				foreach($row as $key=>$value) {
					if ($key == 0) {
						$jobID = $value;
					}
					elseif ($key == 1) {
						$custID = $value;
						if ($value == $userID) {
							$type = "customer";
							echo '<td>Customer</td>';
						}
					}
					elseif ($key == 2) {
						$workID = $value;
						if ($custID == $userID) {
							$qry = "SELECT UserName FROM Users WHERE UserID='$workID' AND Banned='0'";
							$result2 = mysqli_query($link, $qry);
							if($result2 && mysqli_num_rows($result2) > 0) {
								$row = mysqli_fetch_assoc($result2);
								$str = $row["UserName"];
							}
							else {
								$str = 'N/A';
							}
							echo "<td>$str</td>";
						}
						if ($value == $userID) {
							$qry = "SELECT UserName FROM Users WHERE UserID='$custID' AND Banned='0'";
							$result2 = mysqli_query($link, $qry);
							if($result2 && mysqli_num_rows($result2) > 0) {
								$row = mysqli_fetch_assoc($result2);
								$str = $row["UserName"];
							}
							else {
								$str = 'N/A';
							}
							$type = "worker";
							echo '<td>Worker</td>';
							echo "<td>$str</td>";
						}
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
		echo '</table></div>';
	}
	else {
		echo 'None';
	}
	
	if (isset($_POST["mark"])) {
		$jobID = $_POST["jobID"];
		$type = $_POST["type"];
		if ($type == "customer") {
			$qry = "UPDATE Jobs SET CustomerCompleted='1' WHERE JobID='$jobID'";
		}
		elseif ($type == "worker") {
			$qry = "UPDATE Jobs SET WorkerCompleted='1' WHERE JobID='$jobID'";
		}
		$result = mysqli_query($link, $qry);
	}
	mysqli_close($link);
?>
<br>
<br>
</div>
<br>
<br>
<br>
</body>
</html>