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
	$username = $_POST["user"];
	$password = md5($_POST["pass"]);
	require 'link.php';

	$qry="SELECT * FROM Users WHERE UserName='$username' AND Password='$password'";
	$result = mysqli_query($link, $qry);
	if ($result && mysqli_num_rows($result) > 0) {
		echo "Welcome ";
		echo $username;
		echo "!<br>";
	}
	else {
		echo 'Login failed. Please <a href="register.html">register</a>.';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>