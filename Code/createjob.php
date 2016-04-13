<?php
// Start the session
session_start();
?>
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
	$userID = $__SESSION["UserID"];
	$address = $_POST["address"];
	$zip = $_POST["zip"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	require 'link.php';

	$qry = "INSERT INTO Jobs (CustomerID,Description,Price,Date,Time,Address,ZipCode) VALUES ('$userID', '$description', '$price', '$date', '$time', '$address', '$zip')";
	$result = mysqli_query($link, $qry);
	if ($result){
	   echo '<script type="text/javascript">
	   setTimeout(function(){window.location = "home.html"},2000)
	   </script>';
	}
	else{
		echo 'Job creation failed.';
	}
		
	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>
