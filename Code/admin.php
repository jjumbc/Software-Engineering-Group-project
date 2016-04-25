<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Admin Panel</title>
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
		<a href="home.php"><div id="linkcomp">Profile Home</div></a>
		<a href="joblist.php"><div id="linkcomp">Search Jobs</div></a>
		<a href="create_job.php"><div id="linkcomp">Create New Job</div></a>
		<a href="admin.php"><div id="linkcompadmin">Admin Panel</div></a>
		<br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<h2>All Users</h2>
<?php
	$userID = $_COOKIE["UserID"];
	require 'link.php';
	
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
				echo '<td><a href="adminreviewlist.php?ID=', $rowUserID, '&type=worker">', $row3[0], '/5</a></td>';

				$qry4="SELECT COUNT(*) FROM Jobs WHERE CustomerID='$rowUserID'";
				$result4 = mysqli_query($link, $qry4);
				$row4 = mysqli_fetch_row($result4);
				echo '<td>', $row4[0], '</td>';

				$qry5="SELECT AVG(WorkerRating) FROM Reviews JOIN Jobs ON Reviews.JobID=Jobs.JobID WHERE CustomerID='$rowUserID'";
				$result5 = mysqli_query($link, $qry5);
				$row5 = mysqli_fetch_row($result5);
				echo '<td><a href="adminreviewlist.php?ID=', $rowUserID, '&type=customer">', $row5[0], '/5</a></td>';

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