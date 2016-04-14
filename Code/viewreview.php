<!DOCTYPE html>
<html>
	<head>
		<title>Hello!</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
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

<div id="bglayer">
<?php
	require 'link.php';
	$jobID = $_POST["jobID"];
   
   $qry = "SELECT * FROM Reviews WHERE JobID='$jobID'";
   $result = mysqli_query($link, $qry);
   if($result && mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$worker = $row["WorkerReview"];
	$customer = $row["CustomerReview"];
	echo "<h2>Customer Feedback</h2>";
	echo $customer;
	echo "<br><h2>Worker Feedback</h2>";
	echo $worker;
   }
   else{
   echo "Review hasnt been submitted for this job request yet.";
   echo '<script type="text/javascript">
   setTimeout(function(){window.location = "home.html"},2000)
   </script>';
   }
?>
<br>
<br>
<br>
</div>
</body>
</html>
