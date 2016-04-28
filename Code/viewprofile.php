<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - View Profile</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>
<div id="bglayer">
<h2>User Profile</h2>
<table style="width:100%">
	<tr>
		<th>Name:</th>
		
		<th><?php
			$username = $_COOKIE["UserName"];
			$userID = $_COOKIE["UserID"];
			echo $username;
			echo ' ';
			
			require 'link.php';
			$qry = "SELECT LastName FROM UserInfo WHERE UserID='$userID'";
			$result=mysqli_query($link, $qry);
			$row=mysqli_fetch_assoc($result);
			$last=$row["LastName"];
			echo $last;
			
			mysqli_close($link);
		?></th>
	</tr>
	<tr>
		<th>Address:</th>
		<th><?php
			$userID = $_COOKIE["UserID"];
			
			require 'link.php';
			$qry = "SELECT Address1 FROM UserInfo WHERE UserID='$userID'";
			$result=mysqli_query($link, $qry);
			$row=mysqli_fetch_assoc($result);
			$last=$row["Address1"];
			echo $last;
			echo '<br>';
			$qry = "SELECT Address2 FROM UserInfo WHERE UserID='$userID'";
			$result=mysqli_query($link, $qry);
			$row=mysqli_fetch_assoc($result);
			$last=$row["Address2"];
			echo $last;
			
			mysqli_close($link);
		?></th>
	</tr>
	<tr>
		<th>City:</th>
		<th><?php
			$userID = $_COOKIE["UserID"];
			
			require 'link.php';
			$qry = "SELECT City FROM UserInfo WHERE UserID='$userID'";
			$result=mysqli_query($link, $qry);
			$row=mysqli_fetch_assoc($result);
			$last=$row["City"];
			echo $last;
			
			mysqli_close($link);
		?></th>
	</tr>
	<tr>
		<th>State:</th>
		<th><?php
			$userID = $_COOKIE["UserID"];
			
			require 'link.php';
			$qry = "SELECT State FROM UserInfo WHERE UserID='$userID'";
			$result=mysqli_query($link, $qry);
			$row=mysqli_fetch_assoc($result);
			$last=$row["State"];
			echo $last;
			
			mysqli_close($link);
		?></th>
	</tr>
	<tr>
		<th>ZIP Code:</th>
		<th><?php
			$userID = $_COOKIE["UserID"];
			
			require 'link.php';
			$qry = "SELECT ZipCode FROM UserInfo WHERE UserID='$userID'";
			$result=mysqli_query($link, $qry);
			$row=mysqli_fetch_assoc($result);
			$last=$row["ZipCode"];
			echo $last;
			
			mysqli_close($link);
		?></th>
	</tr>
	<tr>
		<th>Email:</th>
		<th><?php
			$userID = $_COOKIE["UserID"];
			
			require 'link.php';
			$qry = "SELECT Email FROM UserInfo WHERE UserID='$userID'";
			$result=mysqli_query($link, $qry);
			$row=mysqli_fetch_assoc($result);
			$last=$row["Email"];
			echo $last;
			
			mysqli_close($link);
		?></th>
	</tr>
	<tr>
		<th>Phone Number:</th>
		<th><?php
			$userID = $_COOKIE["UserID"];
			
			require 'link.php';
			$qry = "SELECT Phonenumber FROM UserInfo WHERE UserID='$userID'";
			$result=mysqli_query($link, $qry);
			$row=mysqli_fetch_assoc($result);
			$last=$row["Phonenumber"];
			echo $last;
			
			mysqli_close($link);
		?></th>
	</tr>
</table>
<a href="inputprofile.php"><div id="link">Edit Profile</div></a>
<br><br><br>
</div>
</html>