<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Ban User</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body background="bg.jpg">
<?php
	require 'header.php';
?>
<div id="login">
<?php
	$userID = $_POST["userID"];
	require 'link.php';

	$qry = "UPDATE Users SET Banned='1' WHERE UserID='$userID' AND NOT Type='1'";
	$result = mysqli_query($link, $qry);

	$qry = "SELECT WorkerID,CustomerID,JobID FROM Jobs WHERE CustomerID='$userID' OR WorkerID='$userID'";
	$result2 = mysqli_query($link, $qry) or die('Ban failed:' . mysqli_error($link) . '<script type="text/javascript">setTimeout(function(){window.location = "admin.php"},1500)</script>');
	
	while($row = mysqli_fetch_assoc($result2)){
		$jobID = $row["JobID"];
		if ($userID == $row["WorkerID"]) {
			$qry = "UPDATE Jobs SET WorkerID=NULL, CustomerCompleted=9, WorkerCompleted=9 WHERE WorkerID='$userID' AND JobID='$jobID'";
			$result3 = mysqli_query($link, $qry) or die('Ban failed:' . mysqli_error($link) . '<script type="text/javascript">setTimeout(function(){window.location = "admin.php"},1500)</script>');
		}
		elseif ($userID == $row["CustomerID"]) {
			$qry = "UPDATE Jobs SET CustomerID=0, CustomerCompleted=9, WorkerCompleted=9 WHERE CustomerID='$userID' AND JobID='$jobID'";
			$result3 = mysqli_query($link, $qry) or die('Ban failed:' . mysqli_error($link) . '<script type="text/javascript">setTimeout(function(){window.location = "admin.php"},1500)</script>');
		}
	}
	
	if ($result) {
	echo 'User Banned!';
	echo '<script type="text/javascript">setTimeout(function(){window.location = "admin.php"},1500)</script>';
	}
	else {
		echo 'Ban failed:' . mysqli_error($link);
		echo '<script type="text/javascript">setTimeout(function(){window.location = "admin.php"},1500)</script>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>