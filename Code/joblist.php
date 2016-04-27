<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Job List</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>
<div id="jobview">
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';

	$qry="SELECT JobID, Description, Price, Date, ZipCode, Banned FROM Jobs JOIN Users ON CustomerID = UserID WHERE WorkerID IS NULL AND NOT (CustomerID = '$userID') AND NOT(Banned=1);";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<div class="nice-table"><table>';
		echo '<tr><th>Job</th><th>Price</th><th>Date to Complete By</th><th>Location</th>';
		echo '<th>Work On Job</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			echo '<tr>';
			foreach($row as $key=>$value) {
				if ($key != 0 && $key != 5) {
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
			echo '</tr>';
		}
		echo '</table></div>';
	}
	else {
		echo '<br>No jobs found in your area! :(<br>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>