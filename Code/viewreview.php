<!DOCTYPE html>
<html>
	<head>
		<title>Hello!</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
	</head>
<body>
<?php
	require 'header.php';
?>

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
