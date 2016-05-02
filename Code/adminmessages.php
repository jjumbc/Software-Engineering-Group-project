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

<div id="bglayer">
<h2>Message Log</h2>
<?php
	require 'link.php';
	
	$qry="UPDATE Alerts SET AdminAlert='0'";
	$result = mysqli_query($link, $qry);
	
	$qry="SELECT a.*, u.UserName FROM AdminMessages a JOIN Users u WHERE u.UserID=a.UserID ORDER BY a.MessageID DESC";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<div class="nice-table"><table>';
		echo '<tr><th style="width: 20%">User</th><th style="width: 80%">Message</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			$userID = $row[1];
			$username = $row[3];
			$message = $row[2];
			echo '<td>ID: ', $userID, '<br>Username: ', $username,'</td>'; 
			echo '<td>',$message,'</td></tr>';
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