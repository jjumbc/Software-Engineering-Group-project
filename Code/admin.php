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
			if ($result && mysqli_num_rows($result) > 0) {
				$show = 'none';
				$row = mysqli_fetch_assoc($result);
				$alert = $row["AdminAlert"];
				if ($alert) {
					$show = 'block';
					$str = 'A user has sent an e-mail to the admins!';
					$qry = "UPDATE Alerts SET AdminAlert=0 WHERE UserID='$userID'";
					$result2 = mysqli_query($link, $qry);
				}
			}
			
	echo '<div id="notification" onclick="fade(this);" style="display: ' . $show . ';">';
	echo $str;
	echo '<div style="float: right;"><span style="color: #D02930;"><b>X</b></span></div></div>';
?>
<div id="bglayer">
<h2>All Users</h2>
<?php

	$qry="SELECT Users.UserID, Users.UserName, UserInfo.FirstName, UserInfo.LastName FROM Users JOIN UserInfo ON Users.UserID=UserInfo.UserID WHERE NOT(Users.UserID=$userID) AND NOT(Banned=1)";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<div class="nice-table"><table>';
		echo '<tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Jobs as Worker</th><th>Worker Rating</th><th>Jobs as Customer</th><th>Customer Rating</th><th>Ban User</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			$rowUserID = $row[0];
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo '<td>', $value, '</td>';
			}
				$qry2="SELECT COUNT(*) FROM Jobs WHERE WorkerID='$rowUserID'";
				$result2 = mysqli_query($link, $qry2);
				$row2 = mysqli_fetch_row($result2);
				echo '<td>', $row2[0], '</td>';

				$qry3="SELECT AVG(CustomerRating) FROM Reviews JOIN Jobs ON Reviews.JobID=Jobs.JobID WHERE WorkerID='$rowUserID'";
				$result3 = mysqli_query($link, $qry3);
				$row3 = mysqli_fetch_row($result3);
				if ($row3[0]) {
					echo '<td><a href="adminreviewlist.php?ID=', $rowUserID, '&type=worker">', substr($row3[0],0,3), ' / 5</a></td>';
				}
				else {
					echo '<td>None</td>';
				}

				$qry4="SELECT COUNT(*) FROM Jobs WHERE CustomerID='$rowUserID'";
				$result4 = mysqli_query($link, $qry4);
				$row4 = mysqli_fetch_row($result4);
				echo '<td>', $row4[0], '</td>';

				$qry5="SELECT AVG(WorkerRating) FROM Reviews JOIN Jobs ON Reviews.JobID=Jobs.JobID WHERE CustomerID='$rowUserID'";
				$result5 = mysqli_query($link, $qry5);
				$row5 = mysqli_fetch_row($result5);
				if ($row5[0]) {
					echo '<td><a href="adminreviewlist.php?ID=', $rowUserID, '&type=customer">', substr($row5[0],0,3), '/ 5</a></td>';
				}
				else {
					echo '<td>None</td>';
				}

				echo '<td><form action="banuser.php" method="POST"><input type="hidden" name="userID" value="' . $rowUserID . '">
				<input type="submit" name="submit" style="width: 100%;" value="Ban This User"></form></td>';
			
			echo '</tr>';
		}
		echo '</table></div>';
	}
	else {
		echo 'None';
	}
?>

<br><br><br></div><div id="bglayer">
<h2>Banned Users</h2>
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';
	
	$qry="SELECT Users.UserID, Users.UserName, UserInfo.FirstName, UserInfo.LastName FROM Users JOIN UserInfo ON Users.UserID=UserInfo.UserID WHERE Banned=1";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo '<div class="nice-table"><table>';
		echo '<tr><th>User ID</th><th>Username</th><th>First Name</th><th>Last Name</th></tr>';
		while($row = mysqli_fetch_row($result)) {
			$rowUserID = $row[0];
			echo '<tr>';
			foreach($row as $key=>$value) {
				echo '<td>', $value, '</td>';
			}
			echo '</tr>';
		}
		echo '</table></div>';
	}
	else {
		echo 'None';
	}
	
	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>