<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Accept Job</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body background="bg.jpg">
<?php
	require 'header.php';
?>
<div id="login">
<?php
	$userID = $_COOKIE["UserID"];
	$jobID = $_POST["jobID"];
	require 'link.php';

	$qry = "UPDATE Jobs SET WorkerID='$userID' WHERE JobID='$jobID'";
	$result = mysqli_query($link, $qry);
	if ($result){
		echo 'Job Accepted!';
		echo '<script type="text/javascript">setTimeout(function(){window.location = "home.php"},1500)</script>';
		$qry = "SELECT CustomerID FROM Jobs WHERE JobID='$jobID'";
		$result2 = mysqli_query($link, $qry);
		$row = mysqli_fetch_assoc($result2);
		$customer = $row["CustomerID"];
		$qry = "UPDATE Alerts SET Accepted=1 WHERE UserID='$customer'";
		$result3 = mysqli_query($link, $qry);
	}
	else{
		echo 'Job acceptance failed:' . mysqli_error($link);
		echo '<script type="text/javascript">setTimeout(function(){window.location = "home.php"},1500)</script>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>