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
	$qry="SELECT Users.*, UserInfo.FirstName FROM Users JOIN UserInfo ON Users.UserID=UserInfo.UserID WHERE UserName='$username' AND Password='$password' AND NOT(Banned=1)";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		setcookie("UserID", $row["UserID"], time() + (86400 * 30), "/");
		setcookie("UserName", $row["FirstName"], time() + (86400 * 30), "/");
		setcookie("UserType", $row["Type"], time() + (86400 * 30), "/");
		echo "Welcome ";
		echo $row["FirstName"];
		echo "!<br>";
		echo '<script type="text/javascript">setTimeout(function(){window.location = "home.php"},2000)</script>';
	}
	else {
		$qry2="SELECT * FROM Users WHERE UserName='$username' AND NOT(Banned=1)";
		$result2 = mysqli_query($link, $qry2);
		if ($result2 && mysqli_num_rows($result2) > 0) {
			echo "Incorrect password! Please try again.";
			echo '<script type="text/javascript">setTimeout(function(){window.location = "login.html"},2000)</script>';
		}
		else {
			echo "User not found. Please register if you have not.";
			echo '<script type="text/javascript">setTimeout(function(){window.location = "login.html"},2000)</script>';
		}
	}
	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>