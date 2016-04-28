<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Edit Profile</title>
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
	$password = md5($_POST["pass"]);
	$newPass = md5($_POST["newPass"]);
	$newPass2 = md5($_POST["newPass2"]);
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
	$qry="SELECT Password FROM Users WHERE UserID=$userID";
	$result = mysqli_query($link, $qry);
	$row = mysqli_fetch_assoc($result);

	$qry2="SELECT State FROM UserInfo WHERE UserID=$userID";
	$result2 = mysqli_query($link, $qry2);
	$row2 = mysqli_fetch_assoc($result2);

	$failure = false;
	if ($row["Password"] !=  $password) {
		echo 'Current Password is incorrect.<br>';
		$failure = true;
	}
	if ($newPass != $newPass2) {
		echo 'New passwords do not match.<br>';
		$failure = true;
	}
	if($failure) {
		echo '<br>Please Try Again.';
		echo '<script type="text/javascript">
		setTimeout(function(){window.location = "inputprofile.php"},2000);
		</script>';		
	}
	else{
		$updates = false;
		if($first != ""){
			echo 'First name updated.<br>';
			$qry="UPDATE UserInfo SET FirstName='$first' WHERE UserID='$userID'";
			setcookie("UserName", $first, time() + (86400 * 30), "/");
			$result = mysqli_query($link, $qry);	
			$updates = true;
		}
		if($last != ""){
			echo 'Last name updated.<br>';
			$qry="UPDATE UserInfo SET LastName='$last' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;		
		}
		if($newPass != md5("")){
			echo 'Password updated.<br>';
			$qry="UPDATE Users SET Password='$newPass' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;
		}
		if($address1 != ""){
			echo 'Address Line 1 updated.<br>';
			$qry="UPDATE UserInfo SET Address1='$address1' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;		
		}
		if($address2 != ""){
			echo 'Address Line 2 updated.<br>';
			$qry="UPDATE UserInfo SET Address2='$address2' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;		
		}
		if($city != ""){
			echo 'City updated.<br>';
			$qry="UPDATE UserInfo SET City='$city' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;		
		}
		if($state != $row2["State"]){
			echo 'State updated.<br>';
			$qry="UPDATE UserInfo SET State='$state' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;
		}
		if($zip != ""){
			echo 'Zip Code updated.<br>';
			$qry="UPDATE UserInfo SET ZipCode='$zip' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;		
		}
		if($tel != ""){
			echo 'Phone number updated.<br>';
			$qry="UPDATE UserInfo SET PhoneNumber='$tel' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;
		}
		if($email != ""){
			echo 'Email updated.<br>';
			$qry="UPDATE UserInfo SET Email='$email' WHERE UserID='$userID'";
			$result = mysqli_query($link, $qry);	
			$updates = true;		
		}
		if($updates) {
			echo '<script type="text/javascript">
			setTimeout(function(){window.location = "viewprofile.php"},1500);
			</script>';
		}
		else {
			echo '<script type="text/javascript">window.location = "viewprofile.php";</script>';
		}
	}
	
	mysqli_close($link);
?>
</div>
<br>
<br>
</body>	
</html>