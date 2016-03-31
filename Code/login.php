<!DOCTYPE html>
<html>
	<head>
		<title>Hello!</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body background="bg.jpg">

<div id="login">
<?php
	if ($_POST["user"] == "handyman" && $_POST["pass"] == "handyman") {
		echo "Welcome ";
		echo $_POST["user"];
		echo "!<br>";
	}
	else {
		echo "User not found, redirecting...<br>";
	}
?>
<br>
<br>
<br>
</div>
</body>
</html>