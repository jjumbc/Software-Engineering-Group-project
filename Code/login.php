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
	$password = $_POST["pass"];
	require 'link.php';

	$qry="SELECT * FROM user_list WHERE (username='$username' OR email='$username') AND password='$password'";
	$result = mysql_query($qry);
	if ($result) {
		$count = mysql_num_rows($result);
		if ($count == 1) {
			echo "Welcome ";
			echo $username;
			echo "!<br>";
		}
		else {
			echo "Login failed";
		}
	}
	else {
		echo "Login failed";
	}

	mysql_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>