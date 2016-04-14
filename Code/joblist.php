<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Job List</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body background="bg.jpg">
<?php
if (!isset($_COOKIE["UserID"])) {
	echo '<script type="text/javascript">window.location = "index.html"</script>';
}
?>
<div id="jobview">
<?php
	require 'link.php';

	$qry="SELECT Description, Price, Date, ZipCode, Completed FROM Jobs";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Job</th><th>Price</th><th>Date to Complete By</th><th>Location</th>';
		echo '<th>Work On Job</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			if ($row[4] == 0) {
				echo '<tr>';
				foreach($row as $key=>$value) {
					if ($key != 4) {
						if ($key == 1) {
							echo '<td>$',$value,'</td>';
						}
						else {
							echo '<td>',$value,'</td>';
						}
					}
				}
				echo '<td><a href="work.html">Click here to work on this job</a></td>';
				echo '</tr>';
			}
		}
		echo '</table>';
	}
	else {
		echo 'No jobs found in your area!<br>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>