<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>

<div id="login">
<?php
	$username = $_POST["user"];
	$password = md5($_POST["pass"]);
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

	$qry = "INSERT INTO Users (UserName,Password) VALUES ('$username', '$password')";
	$result = mysqli_query($link, $qry);
	
	$qry = "SELECT UserID FROM Users WHERE UserName='$username' AND Password='$password'";
	$result = mysqli_query($link, $qry);
	
	$row = mysqli_fetch_assoc($result);
	$id = $row["UserID"];
	
	$qry = "INSERT INTO Alerts (UserID) VALUES ('$id')";
	$result = mysqli_query($link, $qry);
	
	$qry = "INSERT INTO UserInfo (UserID,FirstName,LastName,Address1,Address2,City,ZipCode,State,EMail,PhoneNumber) VALUES ('$id', '$first', '$last', '$address1', '$address2', '$city', '$zip', '$state', '$email', '$tel')";
	$result = mysqli_query($link, $qry);
	if ($result) {
		echo "User ";
		echo $username;
		echo " Added! Welcome to VeriHandy!<br>";
		echo '<script type="text/javascript">
		setTimeout(function(){window.location = "login.html"},1500);
		</script>';
	}
	else {
		echo "Registration failed: " . mysqli_error($link);
		echo '<script type="text/javascript">
		setTimeout(function(){window.location = "register.html"},1500);
		</script>';
	}
	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>