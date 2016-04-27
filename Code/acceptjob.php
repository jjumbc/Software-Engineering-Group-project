<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Work on Job</title>
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
		echo '<script type="text/javascript">setTimeout(function(){window.location = "home.php"},2000)</script>';
	}
	else{
		echo 'Job acceptance failed:' . mysqli_error($link);
		echo '<script type="text/javascript">setTimeout(function(){window.location = "home.php"},2000)</script>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>