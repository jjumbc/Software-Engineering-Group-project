<!DOCTYPE html>
<html>
	<head>
		<title>Hello!</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>

<div id="login">
<?php
	$username = $_POST["user"];
	$password = md5($_POST["pass"]);
	require 'link.php';
	$qry="SELECT * FROM Users WHERE UserName='$username' AND Password='$password'";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		setcookie("UserID", $row["UserID"], time() + (86400 * 30), "/");
		setcookie("UserName", $row["UserName"], time() + (86400 * 30), "/");
		echo "Welcome ";
		echo $username;
		echo "!<br>";
		echo '<script type="text/javascript">setTimeout(function(){window.location = "home.php"},2000)</script>';
	}
	else {
		echo "That User does not exist! Please Register.";
		echo '<script type="text/javascript">setTimeout(function(){window.location = "login.html"},2000)</script>';
	}
	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>