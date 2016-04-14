<!DOCTYPE html>
<html>
	<head>
		<title>VeriHandy - Work on Job</title>
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
		<a href="home.php"><div id="link">Profile Home</div></a>
		<a href="joblist.php"><div id="link">Search Jobs</div></a>
		<a href="create_job.php"><div id="link">Create New Job</div></a><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php
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
	$userID = $_COOKIE["UserID"];
	$jobID = $_POST["jobID"];
	require 'link.php';

	$qry = "UPDATE Jobs SET WorkerID='$userID' WHERE JobID='$jobID'";
	$result = mysqli_query($link, $qry);
	if ($result){
		echo 'Job Accepted!';
		echo '<script type="text/javascript">setTimeout(function(){window.location = "home.php"},2000)</script>';
	}
	else{
		echo 'Job accept failed.';
	}

	mysqli_close($link);
?>
<br>
<br>
<br>
</div>
</body>
</html>