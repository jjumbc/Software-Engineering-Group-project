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
	$userID = $_COOKIE["UserID"];
	$message = $_POST["feedback"];
	$message = wordwrap($message, 70, "\r\n");
	$subject = "Message from User #" . $userID;
	echo 'Message Submitted!';
	//but not really
	echo '<script type="text/javascript">
	   	    setTimeout(function(){window.location = "viewprofile.php"},1500)
	   	    </script>';
?>
</div>
</body>
</html>