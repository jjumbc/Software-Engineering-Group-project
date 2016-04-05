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
	$first = $_POST["first"];
	$last = $_POST["last"];
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	require 'link.php';

	$query = "INSERT INTO user_list (username,password,first,last,address1,address2,city,zip,state,email,tel) VALUES ('$username', '$password', '$first', '$last', '$address1', '$address2', '$city', '$zip', '$state', '$email', '$tel')";
	$test = mysql_query($query);
	if ($test) {
		echo "User ";
		echo $username;
		echo " Added!<br>";
	}
	else {
		echo "FUCK";
	}
	mysql_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>