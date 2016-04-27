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
	if (!$result || !$result2) {
		echo 'Deletion Failed';
	}
?>
<script type="text/javascript">
	window.location = "home.php";
</script>';
</body>
</html>