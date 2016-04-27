<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Home</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';

	$qry = "SELECT Accepted,Reviewed FROM Alerts WHERE UserID='$userID'";
	$result = mysqli_query($link, $qry);
			if ($result && mysqli_num_rows($result) > 0) {
				$show = 'none';
				$row = mysqli_fetch_assoc($result);
				$accepted = $row["Accepted"];
				$reviewed = $row["Reviewed"];
				if ($accepted) {
					$show = 'block';
					$str = 'Someone has accepted one of your jobs! Check it out below.';
				}
				if ($reviewed) {
					$show = 'block';
					$str = 'Someone has reviewed one of your jobs! Check it out below.';
				}
				if ($accepted && $reviewed)
				{
					$show = 'block';
					$str = 'Someone has accepted one of your jobs! Check it out below.';
					echo '<div id="notification" onclick="fade(this);" style="display: ' . $show . ';">';
					echo $str;
					echo '<div style="float: right;"><span style="color: #D02930;"><b>X</b></span></div></div><br>';
					$str = 'Someone has reviewed one of your jobs! Check it out below.';
				}
			}
	echo '<div id="notification" onclick="fade(this);" style="display: ' . $show . ';">';
	echo $str;
	echo '<div style="float: right;"><span style="color: #D02930;"><b>X</b></span></div></div>';
?>
<script>
	function fade(n) {
		n.classList.toggle('fade');
		setTimeout(function(){n.parentNode.removeChild(n)},1000);
	}
</script>
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
					if (($custCompleted == 1 && !$workCompleted && $type == "customer") || ($workCompleted == 1 && !$custCompleted && $type == "worker")) {
						echo '<td><form onsubmit="return false;"><input type="submit" name="mark" style="width: 100%;" value="Pending"></form></td>';
					}
					else {
						echo '<td><form action="" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '"><input type="hidden" name="type" value="' . $type . '">';
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
				if ($result2) {
						echo '<td><form action="ReviewNew.php" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '"><input type="hidden" name="type" value="' . $type . '">
						<input type="submit" name="submit" style="width: 100%;" value="New Review Button Needs A Name"></form></td>';
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