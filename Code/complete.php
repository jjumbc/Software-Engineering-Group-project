<!DOCTYPE html>
<html>
<body>
<?php
	require 'link.php';
	$jobID = $_POST["jobID"];
	$type = $_POST["type"];
	if ($type == "customer") {
		$qry = "UPDATE Jobs SET CustomerCompleted='1' WHERE JobID='$jobID'";
	}
	elseif ($type == "worker") {
		$qry = "UPDATE Jobs SET WorkerCompleted='1' WHERE JobID='$jobID'";
	}
	$result = mysqli_query($link, $qry);
	
?>
<script type="text/javascript">
	window.location = "home.php";
</script>';
</body>
</html>