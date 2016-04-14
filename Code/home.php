<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Home</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body background="bg.jpg">
<?php
if (!isset($_COOKIE["UserID"])) {
	echo '<script type="text/javascript">window.location = "index.html"</script>';
}
?>
<div id="bglayer">
<h2>Open Jobs</h2>
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';
	
	$qry="SELECT Description,Price,Date,Time,ZipCode FROM Jobs WHERE (CustomerID='$userID' OR WorkerID='$userID') AND Completed='0'";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Job</th><th>Price</th><th>Date to Complete By</th><th>Location</th>';
		echo '<th>Work On Job</th></tr>';
		while($row = mysqli_fetch_row($result)) {
				echo '<tr>';
				foreach($row as $key=>$value) {
						if ($key == 1) {
							echo '<td>$',$value,'</td>';
						}
						else {
							echo '<td>',$value,'</td>';
						}
				}
				echo '</tr>';
		}
		echo '</table>';
	}
	else {
		echo 'None';
	}
	echo "<h2>Completed Jobs</h2>";
	$qry="SELECT Description,Price,Date,Time,ZipCode FROM Jobs WHERE (CustomerID='$userID' OR WorkerID='$userID') AND Completed='1'";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Job</th><th>Price</th><th>Date to Complete By</th><th>Location</th>';
		echo '<th>Work On Job</th></tr>';
		while($row = mysqli_fetch_row($result)) {
				echo '<tr>';
				foreach($row as $key=>$value) {
						if ($key == 1) {
							echo '<td>$',$value,'</td>';
						}
						else {
							echo '<td>',$value,'</td>';
						}
				}
				echo '</tr>';
		}
		echo '</table>';
	}
	else {
		echo 'None';
	}
?>
<br>
<br>
<br>
</div>
</body>
</html>