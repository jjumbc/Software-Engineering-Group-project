<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Ban User</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body background="bg.jpg">
<?php
if (!isset($_COOKIE["UserID"])) {
	echo '<script type="text/javascript">window.location = "index.php"</script>';
}
?>
<div id="bglayer">
	<div style="overflow: auto;">
		<a href="home.php"><img class="logo" src="site_logo_small.png" width="250"></a>
		<?php
			if ($_COOKIE["UserType"] == 1) {
				echo '<a href="home.php"><div id="linkcomp">Profile Home</div></a>
				<a href="joblist.php"><div id="linkcomp">Search Jobs</div></a>
				<a href="create_job.php"><div id="linkcomp">Create New Job</div></a>
				<a href="admin.php"><div id="linkcompadmin">Admin Panel</div></a>
				<br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			else {
				echo '<a href="home.php"><div id="link">Profile Home</div></a>
				<a href="joblist.php"><div id="link">Search Jobs</div></a>
				<a href="create_job.php"><div id="link">Create New Job</div></a>
				<br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}

			if (isset($_COOKIE["UserName"])) {
				echo "Hello, ";
				echo $_COOKIE["UserName"];
				echo "! ";
			}
		?>
		<a href="logout.php">Log Out</a>
	</div>
</div>
<br>
<br>

<div id="login">
<?php
	$userID = $_POST["userID"];
	require 'link.php';

	$qry = "UPDATE Users SET Banned=1 WHERE UserID='$userID'";
	$result = mysqli_query($link, $qry);
	if ($result){
		$qry2 = "UPDATE Jobs SET WorkerID=0, CustomerCompleted=9, WorkerCompleted=9 WHERE CustomerID='$userID' OR WorkerID='$userID'";
		$result2 = mysqli_query($link, $qry2);
		if ($result2){
			echo 'User Banned!';
			echo '<script type="text/javascript">setTimeout(function(){window.location = "admin.php"},2000)</script>';
		}
		else{
			echo 'Ban failed.';
			echo '<script type="text/javascript">setTimeout(function(){window.location = "admin.php"},2000)</script>';
		}
	}
	else{
		echo 'Ban failed.';
		echo '<script type="text/javascript">setTimeout(function(){window.location = "admin.php"},2000)</script>';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>