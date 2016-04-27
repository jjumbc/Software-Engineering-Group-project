<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Admin Review List</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>
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
		echo '<div class="nice-table"><table>';
		echo '<tr><th>Review</th><th>Review Score</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo '<td>', $value, '</td>';
			}
			echo '</tr>';
		}
		echo '</table></div>';
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