<!DOCTYPE html>
<html>
<body>
<?php
	require 'link.php';
	$jobID = $_POST["jobID"];
	$qry = "DELETE FROM Jobs WHERE JobID='$jobID'";
	$result = mysqli_query($link, $qry);
	$qry = "DELETE FROM Reviews WHERE JobID='$jobID'";
	$result2 = mysqli_query($link, $qry);
?>
<script type="text/javascript">
	window.location = "adminjobs.php";
</script>';
</body>
</html>