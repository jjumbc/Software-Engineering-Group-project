<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>
<div id="bglayer">
<?php
	require 'link.php';
	$userID = $_COOKIE["UserID"];
	$message = $_POST["feedback"];
	$qry = "INSERT INTO AdminMessages (Message, UserID) VALUES ('$message','$userID')";
	$result = mysqli_query($link, $qry);
	echo 'Message Submitted!';
	$qry = "UPDATE Alerts, Users SET Alerts.AdminAlert='1' WHERE Users.Type='1' AND Users.UserID=Alerts.UserID";
	$result = mysqli_query($link, $qry);
	echo '<script type="text/javascript">
	   	    setTimeout(function(){window.location = "viewprofile.php"},1500)
	   	    </script>';
?>
</div>
</body>
</html>