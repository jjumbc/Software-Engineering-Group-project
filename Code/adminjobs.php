<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>
<div id="bglayer" style="padding: 0px 20px 0px 20px"><h3><a href="admin.php">Users</a>&nbsp;&nbsp;<a href="adminjobs.php">Jobs</a>&nbsp;&nbsp;<a href="adminmessages.php">Messages</a></h3></div><br>
<script>
	function fade(n) {
		n.classList.toggle('fade');
		setTimeout(function(){n.parentNode.removeChild(n)},1000);
	}
</script>
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';
	
	$qry = "SELECT AdminAlert FROM Alerts WHERE UserID='$userID'";
	$result = mysqli_query($link, $qry);
	$show = 'none';
	$str = '';
		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$alert = $row["AdminAlert"];
			if ($alert) {
				$show = 'block';
				$str = 'A user has sent a message to the admins!';
			}
		}
			
	echo '<div id="notification" onclick="fade(this);" style="display: ' . $show . ';">';
	echo $str;
	echo '<div style="float: right;"><span style="color: #D02930;"><b>X</b></span></div></div>';
?>

<div id="bglayer">
<h2>All Jobs</h2>
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';
	
	$qry="SELECT j.*, u1.UserName, u2.UserName, r.CustomerRating, r.CustomerReview, r.WorkerRating, r.WorkerReview FROM Jobs j JOIN Users u1 ON u1.UserID = j.CustomerID LEFT JOIN Users u2 ON u2.UserID = j.WorkerID LEFT JOIN Reviews r ON r.JobID = j.JobID";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<div class="nice-table"><table>';
		echo '<tr><th>Job ID</th><th>Customer</th><th>Worker</th><th>Description</th><th>Price</th><th>Date</th><th>Time</th><th>Address</th><th>Zip Code</th><th>Customer Completed</th><th>Worker Completed</th><th>Remove Job</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			$jobID = $row[0];
			echo '<tr>';
			foreach($row as $key=>$value) {
				if ($key == 1)
				{
					echo '<td>ID: ', $value, '<br>Username: ', $row[11],'</td>';
				}
				else if ($key == 2)
				{
					if ($value == "")
					{
						echo '<td>None</td>';
					}
					else
					{
						echo '<td>ID: ', $value, '<br>Username: ', $row[12],'</td>';
					}
				}
				else if ($key == 4)
				{
					echo '<td>$', $value, '</td>';
				}
				else if ($key == 9 || $key == 10)
				{
					if ($value == 0)
					{
						echo '<td>No</td>';
					}
					else if ($value == 1 && $key == 9)
					{
						if ($row[13] != "" && $row[14] != "")
						{
							echo '<td>Rating: ', $row[13], '/5<br>Review: ', $row[14], '</td>';
						}
						else
						{
							echo '<td>Yes, and unreviewed</td>';
						}
					}
					else if ($value == 1 && $key == 10)
					{
						if ($row[15] != "" && $row[16] != "")
						{
							echo '<td>Rating: ', $row[15], '/5<br>Review: ', $row[16], '</td>';
						}
						else
						{
							echo '<td>Yes, and unreviewed</td>';
						}
					}
					else if ($value == 9)
					{
						echo '<td>Banned Job</td>';
					}
				}
				else if ($key >= 11 && $key <= 16)
				{

				}
				else
				{
					echo '<td>', $value, '</td>';
				}
			}
			echo '<td style="text-align: center;"><form action="removejobadmin.php" method="POST"><input type="hidden" name="jobID" value="' . $jobID . '">';
			echo '<input type="submit" style="background-color: #00ACE6; width: auto;" value="X"></form></td>';
			echo '</tr>';
		}
		echo '</table></div>';
	}
	else {
		echo 'None';
	}
	
	mysqli_close($link);
?>
<br><br><br>
</div>
<br>
<br>
<br>
</body>
</html>